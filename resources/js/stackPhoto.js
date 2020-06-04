(function ($) {
    $(document).ready(function () {

        generateID();
        //Переключалочка
        //choose();
        //generateOption();
        //selectionOption();
        //removeClass();
        //загрузка фото на клік
        uploadImage();
        //Кнопка відправити
        //submit();

        //видаляє усі фотки
        //resetButton();
        //removeNotification();
        //autoRemoveNotification();
        //autoDequeue();

        let ID;
        //let way = 0;
        let queue = [];
        let fullStock = 10;
        //let speedCloseNoti = 1000;

        function generateID() {
            let text = $('header span');
            let newID = '';

            for(let i = 0; i < 3; i++) {
                newID += Math.floor(Math.random() * 3)
            }

            ID = 'ID: 5988' + newID;
            text.html(ID)
        }

        // function choose() {
        //     let li = $('.ways li');
        //     let section = $('.sections section');
        //     let index = 0;
        //     li.on('click', function () {
        //         index = $(this).index();
        //         $(this).addClass('active');
        //         $(this).siblings().removeClass('active');
        //
        //         section.siblings().removeClass('active');
        //         section.eq(index).addClass('active');
        //         if(!way) {
        //             way = 1
        //         }  else {
        //             way = 0
        //         }
        //     })
        // }

        // function generateOption() {
        //     let select = $('select option');
        //     let selectAdd = $('.select-option .option');
        //     $.each(select, function (i, val) {
        //         $('.select-option .option').append('<div rel="'+ $(val).val() +'">'+ $(val).html() +'</div>')
        //     });
        // }

        // function selectionOption() {
        //     let select = $('.select-option .head');
        //     let option = $('.select-option .option div');
        //
        //     select.on('click', function (event) {
        //         event.stopPropagation()
        //         $('.select-option').addClass('active')
        //     })
        //
        //     option.on('click', function () {
        //         let value = $(this).attr('rel');
        //         $('.select-option').removeClass('active');
        //         select.html(value);
        //
        //         $('select#category').val(value)
        //     })
        //}

        // function removeClass() {
        //     $('body').on('click', function () {
        //         $('.select-option').removeClass('active')
        //     })
        // }

        //загрузка фото на клік
        function uploadImage() {
            let button = $('.images .pic')
            let uploader = $('<input type="file" accept="image/*" />');
            let images = $('.images')

            button.on('click', function () {
                uploader.click()
            })

            uploader.on('change', function () {
                let reader = new FileReader();
                reader.onload = function(event) {
                    images.prepend('<div class="img" style="background-image: url(' + event.target.result + ');" rel="'+ event.target.result  +'"><span>remove</span></div>');
                }
                reader.readAsDataURL(uploader[0].files[0]);

            })

            images.on('click', '.img', function () {
                $(this).remove();
            })

        }


        // function submit() {
        //     let button = $('#send');
        //
        //     button.on('click', function () {
        //         if(!way) {
        //             let title = $('#title');
        //             let cate  = $('#category');
        //             let images = $('.images .img');
        //             let imageArr = []
        //
        //
        //             for(let i = 0; i < images.length; i++) {
        //                 imageArr.push({url: $(images[i]).attr('rel')});
        //             }
        //
        //             let newStock = {
        //                 title: title.val(),
        //                 category: cate.val(),
        //                 images: imageArr,
        //                 type: 1
        //             };
        //
        //             saveToQueue(newStock)
        //         } else {
        //             // discussion
        //             let topic = $('#topic');
        //             let message = $('#msg');
        //
        //             let newStock = {
        //                 title: topic.val(),
        //                 message: message.val(),
        //                 type: 2
        //             }
        //
        //             saveToQueue(newStock);
        //         }
        //     })
        // }

        // function removeNotification() {
        //     let close = $('.notification');
        //     close.on('click', 'span', function () {
        //         let parent = $(this).parent();
        //         parent.fadeOut(300);
        //         setTimeout(function() {
        //             parent.remove()
        //         }, 300);
        //     })
        // }

        // function autoRemoveNotification() {
        //     setInterval(function() {
        //         let notification = $('.notification');
        //         let notiPage = $(notification).children('.btn');
        //         let noti = $(notiPage[0]);
        //
        //         setTimeout(function () {
        //             setTimeout(function () {
        //                 noti.remove()
        //             }, speedCloseNoti);
        //             noti.fadeOut(speedCloseNoti)
        //         }, speedCloseNoti)
        //     }, speedCloseNoti)
        // }

        // function autoDequeue() {
        //     let notification = $('.notification');
        //     let text;
        //
        //     setInterval(function () {
        //
        //         if(queue.length > 0) {
        //             if(queue[0].type == 2) {
        //                 text = ' Your discusstion is sent'
        //             } else {
        //                 text = ' Your order is allowed.'
        //             }
        //
        //             notification.append('<div class="success btn"><p><strong>Success:</strong>'+ text +'</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>');
        //             queue.splice(0, 1);
        //
        //         }
        //     }, 10000);
        // }

        // function resetButton() {
        //     let resetbtn = $('#reset');
        //     resetbtn.on('click', function () {
        //         reset();
        //     });
        // }

        // helpers
        // function saveToQueue(stock) {
        //     let notification = $('.notification');
        //     let check = 0;
        //
        //     if(queue.length <= fullStock) {
        //         if(stock.type == 2) {
        //             if(!stock.title || !stock.message) {
        //                 check = 1;
        //             }
        //         } else {
        //             if(!stock.title || !stock.category || stock.images == 0) {
        //                 check = 1;
        //             }
        //         }
        //
        //         if(check) {
        //             notification.append('<div class="error btn"><p><strong>Error:</strong> Please fill in the form.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>');
        //         } else {
        //             notification.append('<div class="success btn"><p><strong>Success:</strong> '+ ID +' is submitted.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>');
        //             queue.push(stock);
        //             reset();
        //         }
        //     } else {
        //         notification.append('<div class="error btn"><p><strong>Error:</strong> Please waiting a queue.</p><span><i class=\"fa fa-times\" aria-hidden=\"true\"></i></span></div>');
        //     }
        // }


        // function reset() {
        //
        //     $('#title').val('');
        //     $('.select-option .head').html('Category');
        //     $('select#category').val('');
        //
        //     let images = $('.images .img');
        //     for(let i = 0; i < images.length; i++) {
        //         $(images)[i].remove()
        //     }
        //
        //     let topic = $('#topic').val('');
        //     let message = $('#msg').val('');
        // }
    })
})(jQuery);
