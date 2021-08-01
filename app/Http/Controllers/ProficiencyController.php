<?php

namespace App\Http\Controllers;

use App\Proficiency;
use App\User;
use App\role;
use Illuminate\Http\Request;

class ProficiencyController extends Controller
{

        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('help');
        
    }
    
        public function index(Request $request)
    {
         $s = $request->input('s');

            $proficiencies = Proficiency::with('user')->search($s)
            ->paginate(10);
            
            return view ('help.proficiency.home', compact('proficiencies', 's'));
    }

        public function create()
        {
        $proficiencies = Proficiency::all();

        return view ('help.proficiency.register', compact('proficiencies'));
        }

        public function store (Request $request)
        {
            $this->validate(request(),  [
                'name' => 'required|string|max:50|unique:proficiencies',
                // 'file' => 'mimes:jpg,jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // ensure the request has a file before we attempt anything else.
            if ($request->hasFile('file')) {

                $request->validate([
                    'file' => 'mimes:jpg, jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
                ]);
                // $imagePath = $request->file('file');
                // $imageName = $imagePath->getClientOriginalName();

                // $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
                // Save the file locally in the storage/public/ folder under a new folder named /chuyenkhoa
                // $request->file->store('chuyenkhoa', 'public');

                // Store the record, using the new file hashname which will be it's new filename identity.
                $imageName = time().'.'.$request->file->extension(); 
                $request->file->move(public_path('uploads/chuyenkhoa'), $imageName); 
            }
            // $proficiency = Proficiency::create([
            //     'name' => request('name'),
            // ]);

            $proficiency = new Proficiency([
                "name" => $request->get('name'),
                // "pro_avatar" => $request->file->hashName()
                "pro_avatar" => $imageName
            ]);
            $proficiency->save(); // Finally, save the record.

            session()->flash('message', 'Tạo chuyên khoa mới thành công!');
            
            return redirect('/help/proficiency/home');

        }

        public function show ($id)
        {
            $proficiency = Proficiency::findOrFail($id);

            
        }

        public function edit ($id)
        {
            $proficiency = Proficiency::find($id);

            return view ('help.proficiency.edit', compact('proficiency'));
        }

        public function update (Request $request, $id)
        {
           $this->validate($request, [
                'name' => 'required|string|max:50',
                // 'file' => 'mimes:jpg,jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);
        
            $proficiency = Proficiency::findOrFail($id);
            if ($request->hasFile('file')) {

                $request->validate([
                    'file' => 'mimes:jpg,jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
                ]);
                // $imagePath = $request->file('file');
                // $imageName = $imagePath->getClientOriginalName();

                // $path = $request->file('file')->storeAs('uploads', $imageName, 'public');
                // Save the file locally in the storage/public/ folder under a new folder named /chuyenkhoa
                // $request->file->store('chuyenkhoa', 'public');

                // Store the record, using the new file hashname which will be it's new filename identity.
                // $imageName = time().'.'.$request->file->extension(); 
                // $imagePath = $request->file('file');
                // $imageName = time();
                // $imageName .= $imagePath->getClientOriginalName(); 
                $imageName = time().'.'.$request->file->extension();             
                $request->file->move(public_path('uploads/chuyenkhoa'), $imageName);
                //xoa file hien tai
                if ($proficiency->pro_avatar)
                    unlink(public_path('uploads/chuyenkhoa/') . $proficiency->pro_avatar); 
                $proficiency->pro_avatar = $imageName;
            }
            // $proficiency->update($request->all());
            $proficiency->name = request('name');
            // $imageName = time().'.'.$request->file->extension(); 
            
            $proficiency->save();
            session()->flash('message', 'Cập nhật chuyên khoa thành công!');
            
            return redirect('/help/proficiency/home');

        }

        public function showAttach() 
        {
            $proficiencies = Proficiency::All();
            $users = User::with(['role' => function($q){
            $q->where('name', 'Doctor');
            }])->get();
            /*$user = User::all();
            $users = $user->where('role', 'Doctor');*/

            return view ('help.proficiency.attach', compact('proficiencies', 'users'));

        }


        public function attach(Request $request) 
        {
             
            $user_id = $request->input('user_id');
            $prof_id = $request->input('prof_id');      

            $user = User::findOrFail($user_id);

            $user->proficiencies()->syncWithoutDetaching(Proficiency::where('id', $prof_id)->first());


            /*if($user->proficiencies()->contains(Proficiency::where('id', $prof_id)->first())) {
                 $user->proficiencies()->attach(Proficiency::where('id', $prof_id)->first());
                 session()->flash('message', 'Proficiency attached successfully!');
                return redirect('/help/proficiency/home');
            }
*/              session()->flash('message', 'Proficiency attached successfully!');
                return redirect('/help/proficiency/home');
               

             

        

        }

        public function destroy($id)
        {
            $proficiency = Proficiency::findOrFail($id);
            $proficiency->user()->detach();
            /*$proficiency->user()->detaching(Proficiency::where($id, $proficiency_id)->first());*/
            $proficiency->delete();

            session()->flash('message', 'Proficiency deleted successfully!');
        
            return redirect('/help/proficiency/home');

        }

}
