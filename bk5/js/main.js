$(function () {
    function select_customer() {
        $('.content-list-all tr').eq(1).addClass('active');
    }

    select_customer()

    //content-list-allのactive切り替え
    $(document).on('click', '.content-list-all tr.check', function () {
        var index = $('.content-list-all tr.check').index(this);
        $('.content-list-all tr.check').removeClass('active');
        $(this).addClass('active');
        //
        var number = $(this).data('number');
        $.ajax({
            url: 'ajax.php',
            type: "GET",
            data: {
                number: number,
                click_all_list: 'click_all_list'
            }
        }).done(function (data) {
            $('.content-list-one').html(data);
        });


    });


    function all_update() {
        var number = number;
        $.ajax({
            url: 'ajax.php',
            type: 'GET',
            data: {
                all_update: 'all'
            }
        }).done(function (data) {
            $('.content-list-all').html(data);
            select_customer();
        });
        $.ajax({
            url: 'ajax.php',
            type: 'GET',
            data: {
                all_update: 'link'
            }
        }).done(function (data) {
            $('.content-link').html(data);
        });
        $.ajax({
            url: 'ajax.php',
            type: 'GET',
            data: {
                all_update: 'one'
            }
        }).done(function (data) {
            $('.content-list-one').html(data);
        });
        $.ajax({
            url: 'ajax.php',
            type: 'GET',
            data: {
                all_update: 'menu'
            }
        }).done(function (data) {
            $('.menu').html(data);
        });

        $('.Verification').removeClass('hide');

    }
    //-----------------------------------------------【閉じる】
    $(document).on('click', '.Verification button', function () {
        $('.Verification').addClass('hide');
    })
    //-----------------------------------------------【表示】
    //代理店切り替え
    $(document).on('click', '.menu-agency li', function () {
        var index = $('.menu-agency li').index(this);
        $('.menu-agency li').removeClass('active');
        $(this).addClass('active');
        //
        var number = $(this).data('agency_id');

        $.ajax({
            url: 'ajax.php',
            type: "GET",
            data: {
                number: number,
                click_menu_agency: 'all'
            }
        }).done(function (data) {
            $('.content-list-all').html(data);
            select_customer();
        });

        $.ajax({
            url: 'ajax.php',
            type: 'GET',
            data: {
                number: number,
                click_menu_agency: 'link'
            }
        }).done(function (data) {
            $('.content-link').html(data);
        });

        $.ajax({
            url: 'ajax.php',
            type: 'GET',
            data: {
                number: number,
                click_menu_agency: 'one'
            }
        }).done(function (data) {
            $('.content-list-one').html(data);
            //            $('.content-list-one').text(data);
        });

    });
    
    //契約別切り替え
    $(document).on('click','#total,#genkai,#sim,#sugoi', function() {
        var click_class = $(this).attr('id');
        var number = $('.change-agreement').data('change');
        $('.content-link a').removeClass('active');
        $(this).addClass('active');
        $.ajax({
            url: 'ajax.php',
            type: 'GET',
            data: {
                click_class: click_class,
                number: number,
                change_show: 'all'
            }
        }).done(function(data) {
            
            $('.content-list-all').html(data);
            select_customer();
        });
        $.ajax({
            url: 'ajax.php',
            type: 'GET',
            data: {
                click_class: click_class,
                number: number,
                change_show: 'one'
            }
        }).done(function(data) {
            $('.content-list-one').html(data);
        });
    })
    //-------------------------------------------【追加】

    //代理店追加
    $(document).on('click', '.agency_add', function () {
        if ($("[name='agency_regit_name']").val() == '' || $("[name='agency_regit_yomi']").val() == '') {
            //入力されていない場合
            $('.agency_regit_coution').text('名前とよみの記入は必須です。');
        } else {
            $.ajax({
                url: 'ajax.php',
                type: 'GET',
                data: {
                    name: $("[name='agency_regit_name']").val(),
                    yomi: $("[name='agency_regit_yomi']").val(),
                    phone: $("[name='agency_regit_phone']").val(),
                    agency_add: 'agency_add'
                }
            }).done(function (data) {
                all_update();
            });
        }
    });
    //---------------------------

    //WEB在庫追加
    $(document).on('click', '.web_regit', function () {
        var day = $("[name='web_regit_day']").val();
        var num1 = $("[name='web_regit_num1']").val();
        var num2 = $("[name='web_regit_num2']").val();
        if (day == '' || num1 == '' || num2 == '') {
            $('.web_coution').text('未入力があります。');
        } else {
            if ($.isNumeric(num1) && $.isNumeric(num2)) {
                if (num1 >= num2) {
                    $.ajax({
                        url: 'ajax.php',
                        type: 'GET',
                        data: {
                            day: day,
                            num1: num1,
                            num2: num2,
                            web_regit: 'regit'
                        }
                    }).done(function (data) {
                        //                        location.reload();
                        //                        $('body').hide();
                    });
                } else {
                    $('.stock_coution').text('WEB在庫は注文台数より少なく設定してください。')
                }
            } else {
                $('.stock_coution').text('数量を半角で入力してください。');
            }
        }
    });

    //-------------------------------------------------------【編集】

    //代理店編集
    $(document).on('click', '.kettei_agency', function () {
        var name = $(this).parents('.menu_list').find($("[name='agency_edit_name']")).val();
        var yomi = $(this).parents('.menu_list').find($("[name='agency_edit_yomi']")).val();
        var phone = $(this).parents('.menu_list').find($("[name='agency_edit_phone']")).val();
        var number = $(this).parents('.menu_list').find('.kettei_agency').data('number');

        if (name == '' || yomi == '') {
            $('.agency_edit_coution').text('名前とよみの入力は必須です。');
        } else {
            $('.agency_edit_coution').text(name + yomi + phone + number);
            $.ajax({
                url: 'ajax.php',
                type: 'GET',
                data: {
                    name: name,
                    yomi: yomi,
                    phone: phone,
                    number: number,
                    agency_edit: 'agency_edit'
                }
            }).done(function (data) {
                $('.agency_edit_coution').text(data);
            })
        }
    })

    //web在庫編集
    $(document).on('click', '.kettei_stock', function () {
        var day = $(this).parents('.menu_list').find($("[name='web_edit_day']")).val();
        var num1 = $(this).parents('.menu_list').find($("[name='web_edit_num1']")).val();
        var num2 = $(this).parents('.menu_list').find($("[name='web_edit_num2']")).val();
        var id = $(this).parents('.menu_list').find('.kettei_stock').data('id');
        if (day == '' || num1 == '' || num2 == '') {
            $('.stock_edit_coution').text('未入力があります。');
        } else {
            if ($.isNumeric(num1) && $.isNumeric(num2)) {
                if (num1 >= num2) {
                    $.ajax({
                        url: 'ajax.php',
                        type: 'GET',
                        data: {
                            day: day,
                            num1: num1,
                            num2: num2,
                            id: id,
                            web_regit: 'edit'
                        }
                    }).done(function (data) {

                    })
                } else {
                    $('.stock_edit_coution').text('WEB在庫は注文台数より少なく設定してください。');
                }
            } else {
                $('.stock_edit_coution').text('数量を半角で入力してください');
            }
        }
    })


    //-------------------------------------------------------【削除】

    //削除ボタン設定（代理店）
    $(document).on('change', '.agency_delete', function () {
        var button = $(this).parents('.menu_list').find($("[name='delete_agency']"));
        var result = button.prop('disabled');
        if (result) {
            button.prop('disabled', false);
            $(this).parents('.menu_list').find($('.agency_edit_coution')).text('削除すると元には戻せません');
        } else {
            button.prop('disabled', true);
            $(this).parents('.menu_list').find($('.agency_edit_coution')).text('　');
        }
    });
    //代理店削除
    $(document).on('click', '.delete_agency', function () {
        var number = $(this).parents('.menu_list').find('.kettei_agency').data('number');
        $.ajax({
            url: 'ajax.php',
            type: 'GET',
            data: {
                number: number,
                delete_agency: 'delete_agency'
            }
        }).done(function (data) {
            $('.agency_edit_coution').text(data);
        })
    })

    //削除ボタン設定（限界突破WiFi）
    $(document).on('change', '.stock_delete', function () {
        var button = $(this).parents('.menu_list').find($("[name='delete_stock']"));
        var result = button.prop('disabled');
        if (result) {
            button.prop('disabled', false);
            $(this).parents('.menu_list').find($('.stock_edit_coution')).text('削除すると元には戻せません');
        } else {
            button.prop('disabled', true);
            $(this).parents('.menu_list').find($('.stock_edit_coution')).text('　');
        }
    });

    //限界突破WiFi削除
    $(document).on('click', '.delete_stock', function () {
        var id = $(this).parents('.menu_list').find('.kettei_stock').data('id');
        $.ajax({
            url: 'ajax.php',
            type: 'GET',
            data: {
                id: id,
                delete_stock: 'delete_stock'
            }
        }).done(function (data) {
            $('.stock_edit_coution').text(data);
        })
    })



    //-----------------------------------------------------【変更】

    //代理店変更
    $(document).on('click', '.change_agency', function () {
        $("[name='select_agency']").removeClass('hide');
        $('.agency_name').addClass('hide');
    })








    $(document).on('change', '[name=select_agency]', function () {

        var id = $("[name=select_agency] option:selected").val();
        var number = $('.details_number').data('number');
        $.ajax({
            url: 'ajax.php',
            type: 'GET',
            data: {
                id: id,
                number: number,
                change_agency: 'change_agency'
            }
        }).done(function (data) {
            //ここ
            all_update();

        })
    })

    //契約種別変更
    $(document).on('click', '.change_agreement', function () {
        $("[name='select_agreement']").removeClass('hide');
        $('.agreement_name').addClass('hide');
    })

    $(document).on('change', '[name=select_agreement]', function () {
        var id = $("[name=select_agreement] option:selected").val();
        var number = $('.details_number').data('number');

        $.ajax({
            url: 'ajax.php',
            type: 'GET',
            data: {
                id: id,
                number: number,
                change_agreement: 'change_agreement'
            }
        }).done(function (data) {
            all_update();
        })
    })

    //メモ変更
    $(document).on('click', '.change_memo', function () {
        $("[name=memo]").removeClass('hide');
        $('.memo').addClass('hide');
    })

    $(document).on('click', '.change_memo_regit', function () {
        var memo = $("[name=memo] textarea").val();
        var number = $('.details_number').data('number');
        $.ajax({
            url: 'ajax.php',
            type: 'GET',
            data: {
                memo: memo,
                number: number,
                change_memo_regit: 'change_memo'
            }
        }).done(function (data) {
            all_update();
        })
    })







    //メニューの開閉
    $(document).on('click', '.menu_tab dt', function () {
        if ($(this).next().css('display') != 'none') {
            $(this).children('span').text('＋');
            $(this).next().slideToggle(300);
        } else {
            $(this).children('span').text('－');
            $(this).next().slideToggle(300);
        }
    });

    //
    $(document).on('click', '.menu_list .edit', function () {
        if ($(this).text() == '編集') {
            $(this).text('中止');
            $(this).parents('.menu_list').find('span').addClass('hide');
            $(this).parents('.menu_list').find('input').removeClass('hide');
            $(this).parents('.menu_list').find('button').removeClass('hide');
        } else {
            $(this).text('編集');
            $(this).parents('.menu_list').find('span').removeClass('hide');
            $(this).parents('.menu_list').find('input').addClass('hide');
            $(this).parents('.menu_list').find('button').addClass('hide');
        }

    });
    $(document).on('click', '.menu_list .show', function () {
        $(this).parents('.menu_list').find('span').removeClass('hide');
        $(this).parents('.menu_list').find('input').addClass('hide');
    });

    //スマホメニュー
    //close
    $(document).on('click', '.menu-close', function() {
        $('.menu').hide();
        $('.mb-menu-button').removeClass('active');
    })

    //
    $(document).on('click', '.mb-menu-button', function() {
        $('.menu-agency,.menu-incentive,.menu-config').hide();
        $('.mb-menu-button').removeClass('active');
        $(this).addClass('active');
        $('.menu').show();
        var check = $(this).data('name');
        if(check == 'agency') {
            $('.menu-agency').show();
        } else if(check == 'incentive') {
            $('.menu-incentive').show();
        } else if(check == 'config') {
            $('.menu-config').show();
        }
    });
});
