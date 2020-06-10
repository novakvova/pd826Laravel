<script>
    $(document).ready(function () {

        
        let cropper;
        let dialogCropper = $("#cropperModal");
        //generateID();

        initCropper();
        //загрузка фото на клік
        uploadImage();





        //загрузка фото на клік
        function uploadImage() {
            let button = $('.images .pic');

            let images = $('.images');

            button.on('click', function () {
                let uploader = $('<input type="file" accept="image/*" />');
                uploader.click()
                uploader.on('change', function () {
                    let reader = new FileReader();
                    reader.onload = function(event) {

                        dialogCropper.modal('show');
                        cropper.replace(event.target.result);
                        uploader.remove();
                        //
                    };
                    reader.readAsDataURL(uploader[0].files[0]);

                });
            });

            images.on('click', '.img', function () {
                $(this).remove();
            });

            //обрізка малюнка
            $("#cropImg").on("click", function (e) {
                e.preventDefault();
                var imgContent = cropper.getCroppedCanvas().toDataURL();

                axios.post('/products/upload',{ imageBase64: imgContent })
                    .then((resp)=> {
                        let url = resp.data.url;
                        let id = resp.data.id;
                        images.prepend('<div class="img" style="background-image: url(' + url + ');" rel="'+ url  +'"><span>remove</span></div>');
                        images.prepend('<input type="hidden" name="productImages[]" value="'+id+'">');
                        console.log("Result", resp);
                    });

                //images.prepend('<div class="img" style="background-image: url(' + imgContent + ');" rel="'+ imgContent  +'"><span>remove</span></div>');
                dialogCropper.modal('hide');
            });

        }

        function initCropper() {
            //запуск кропера
            const imageCropper = document.getElementById('imageCropper');
            cropper = new Cropper(imageCropper, {
                aspectRatio: 420/320,
                viewMode: 1,
                autoCropArea: 0.5,
                crop(event) {
                    // console.log(event.detail.x);
                    // console.log(event.detail.y);
                    // console.log(event.detail.width);
                    // console.log(event.detail.height);
                    // console.log(event.detail.rotate);
                    // console.log(event.detail.scaleX);
                    // console.log(event.detail.scaleY);
                },
            });
        }
    });


</script>