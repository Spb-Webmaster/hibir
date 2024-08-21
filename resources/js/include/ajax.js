    /*  загрузка аватара */
    export function upload_f() {


        $('.upload_f').change(function (event) {
            if (window.FormData === undefined) {
                alert('В вашем браузере FormData не поддерживается')
            } else {
                var Parent = $(this).parents('.image-upload__cabinet');
                event.preventDefault();
                let form = $(this).parents('form').get(0);
                let formData = new FormData(form);


                $.ajax({
                    async: true,
                    url: '/cabinet/upload-avatar',
                    headers: {
                        "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    contentType: false,
                    data: formData,
                    cache: false,
                    processData: false,
                    success: function (result) {
                        console.log(result);

                        if (result.success == true) {

                            Parent.find('.site_avatar').css('background-image', 'url(' + result.avatar + ')');
                            $('.enter_to_website__a .site_avatar').css('background-image', 'url(' + result.avatar + ')');

                        } else {
                            console.log(result);
                            alert('Ошибка при загрузке файла');

                        }
                    },
                    error: function (data) {
                        console.log(data.err);
                        console.log(data);
                    }
                });


            }
        });
        return true;

    }
    /*  загрузка аватара */

    /*  загрузка фото на стронице user */
    export function upload_photo() {
        let uploadButton = document.getElementById("upload-button");
        let chosenImage = document.getElementById("chosen-image");
        let fileName = document.getElementById("file-name");
        let container = document.querySelector(".drob_container");
        let error = document.getElementById("error");
        let imageDisplay = document.getElementById("image-display");
        let form = document.getElementById("form_drob");
        const fileHandler = (file, name, type) => {
            if (type.split("/")[0] !== "image") {
                //File Type Error
                error.innerText = "Please upload an image file";
                return false;
            }
            error.innerText = "";
            let reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onloadend = () => {
                //image and file name
                let imageContainer = document.createElement("figure");
                let img = document.createElement("img");
                img.src = reader.result;
                imageContainer.appendChild(img);
                imageContainer.innerHTML += `<figcaption>${name}</figcaption>`;
                imageDisplay.appendChild(imageContainer);
            };


        };

        //Upload Button
        uploadButton.addEventListener("change", () => {
            imageDisplay.innerHTML = "";
            Array.from(uploadButton.files).forEach((file) => {
                //   fileHandler(file, file.name, file.type);
            });


            form.submit();

        });

        container.addEventListener(
            "dragenter",
            (e) => {
                e.preventDefault();
                e.stopPropagation();
                container.classList.add("active");
            },
            false
        );

        container.addEventListener(
            "dragleave",
            (e) => {
                e.preventDefault();
                e.stopPropagation();
                container.classList.remove("active");
            },
            false
        );

        container.addEventListener(
            "dragover",
            (e) => {
                e.preventDefault();
                e.stopPropagation();
                container.classList.add("active");
            },
            false
        );

        container.addEventListener(
            "drop",
            (e) => {
                e.preventDefault();
                e.stopPropagation();
                container.classList.remove("active");
                let draggedData = e.dataTransfer;
                let files = draggedData.files;
                imageDisplay.innerHTML = "";
                Array.from(files).forEach((file) => {
                    fileHandler(file, file.name, file.type);
                });
            },
            false
        );

        window.onload = () => {
            error.innerText = "";
        };
    }
