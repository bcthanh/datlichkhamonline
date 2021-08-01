$(document).ready(function($) {
    var engine1 = new Bloodhound({
        remote: {
            url: '/search/name?value=%QUERY%',
            wildcard: '%QUERY%'
        },
        datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
        queryTokenizer: Bloodhound.tokenizers.whitespace
    });

    // var engine2 = new Bloodhound({
    //     remote: {
    //         url: '/search/address?value=%QUERY%',
    //         wildcard: '%QUERY%'
    //     },
    //     datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
    //     queryTokenizer: Bloodhound.tokenizers.whitespace
    // });

    // var engine3 = new Bloodhound({
    //     remote: {
    //         url: '/search/chuyenkhoa?value=%QUERY%',
    //         wildcard: '%QUERY%'
    //     },
    //     datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
    //     queryTokenizer: Bloodhound.tokenizers.whitespace
    // });

    $(".search-input").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, [
        {
            source: engine1.ttAdapter(),
            name: 'doctors-name',
            display: function(data) {
                return data.name;
            },
            templates: {
                empty: [
                    '<div class="header-title">Tên bác sĩ</div><div class="list-group search-results-dropdown"><div class="list-group-item">Không tìm thấy kết quả phù hợp.</div></div>'
                ],
                header: [
                    '<div class="header-title">Danh sách bác sĩ gợi ý</div><div class="list-group search-results-dropdown"></div>'
                ],
                suggestion: function (data) {
                    return '<a href="/doctor-profile/' + data.slug + '" class="list-group-item">' + data.name + '</a>';
                }
            }
        }, 
        // {
        //     source: engine2.ttAdapter(),
        //     name: 'doctors-address',
        //     display: function(data) {
        //         return data.profile.clinic_address;
        //     },
        //     templates: {
        //         empty: [
        //             '<div class="header-title">Email</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
        //         ],
        //         header: [
        //             '<div class="header-title">Email</div><div class="list-group search-results-dropdown"></div>'
        //         ],
        //         suggestion: function (data) {
        //             return '<a href="/students/' + data.id + '" class="list-group-item">' + data.profile.clinic_address + '</a>';
        //         }
        //     }
        // },
        // {
        //     source: engine3.ttAdapter(),
        //     name: 'doctors-address',
        //     display: function(data) {
        //         return data.profile.clinic_address;
        //     },
        //     templates: {
        //         empty: [
        //             '<div class="header-title">Email</div><div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
        //         ],
        //         header: [
        //             '<div class="header-title">Email</div><div class="list-group search-results-dropdown"></div>'
        //         ],
        //         suggestion: function (data) {
        //             return '<a href="/students/' + data.id + '" class="list-group-item">' + data.profile.clinic_address + '</a>';
        //         }
        //     }
        // }
    ]);
});