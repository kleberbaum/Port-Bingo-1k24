$(function() {

    try {

        $.post('index.php', {
            get_bco: 'c_user'
        }, function (data, status) {
            var p = Number(data).toString(2).split('');

            var b = [p[1], p[2], p[3], p[4], p[5]],
                i = [p[6], p[7], p[8], p[9], p[10]],
                n = [p[11], p[12], p[13], p[14], p[15]],
                g = [p[16], p[17], p[18], p[19], p[20]],
                o = [p[21], p[22], p[23], p[24], p[25]];

            $('.bp').each(function() {
                var name = $(this).prop('name')

                switch(name[0]){
                    case 'b':
                        if(b[name[1]] == 1){
                            $(this).prop('checked', true);
                        }
                        break;

                    case 'i':
                        if(i[name[1]] == 1){
                            $(this).prop('checked', true);
                        };
                        break;

                    case 'n':
                        if(n[name[1]] == 1){
                            $(this).prop('checked', true);
                        };
                        break;

                    case 'g':
                        if(g[name[1]] == 1){
                            $(this).prop('checked', true);
                        };
                        break;

                    case 'o':
                        if(o[name[1]] == 1){
                            $(this).prop('checked', true);
                        };
                }
            });

            // alert(status);
        });

        $.post('index.php', {
            get_bco: 'all_user'
        }, function (data, status) {
            var data = data.split(';');

            //alert(data[1].split(',')[1]);

            data.forEach(function(user) {

                var p = Number(user.split(',')[1]).toString(2).split('');
                var q = '#' + user.split(',')[0] + ' .obcp';

                var b = [p[1], p[2], p[3], p[4], p[5]],
                    i = [p[6], p[7], p[8], p[9], p[10]],
                    n = [p[11], p[12], p[13], p[14], p[15]],
                    g = [p[16], p[17], p[18], p[19], p[20]],
                    o = [p[21], p[22], p[23], p[24], p[25]];

                $(q).each(function() {
                    var name = $(this).prop('name');

                    // alert(name);

                    switch(name[0]){
                        case 'b':
                            if(b[name[1]] == 1){
                                $(this).prop('checked', true);
                            }
                            break;

                        case 'i':
                            if(i[name[1]] == 1){
                                $(this).prop('checked', true);
                            };
                            break;

                        case 'n':
                            if(n[name[1]] == 1){
                                $(this).prop('checked', true);
                            };
                            break;

                        case 'g':
                            if(g[name[1]] == 1){
                                $(this).prop('checked', true);
                            };
                            break;

                        case 'o':
                            if(o[name[1]] == 1){
                                $(this).prop('checked', true);
                            };
                    }
                });
            });

            alert(status);
        });


        $('.bp').on('change', function() {

            var apost = [1];
            var b = [0, 0, 0, 0, 0],
                i = [0, 0, 0, 0, 0],
                n = [0, 0, 1, 0, 0],
                g = [0, 0, 0, 0, 0],
                o = [0, 0, 0, 0, 0];

            $('.bp:checked').each(function() {
                var name = $(this).prop('name');

                switch(name[0]){
                    case 'b':
                        b[name[1]] = 1;
                        break;

                    case 'i':
                        i[name[1]] = 1;
                        break;

                    case 'n':
                        n[name[1]] = 1;
                        break;

                    case 'g':
                        g[name[1]] = 1;
                        break;

                    case 'o':
                        o[name[1]] = 1;

                }

            });

            apost = apost.concat(b, i, n, g, o);

            apost = parseInt(apost.join(''), 2);

            $.post('index.php', {
                bco: apost
            }, function (data, status) {
                // alert(data);
                // alert(status);
            });

        });
    }
    catch(error) {
        alert('shithappns');
    }

});