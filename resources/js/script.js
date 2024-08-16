
import { upload_f } from './include/ajax';
import { imask } from './include/imask';
import { slick } from './include/slick';
import { input_label, _iserror } from './include/input';
import { close_flash } from './include/flash';
import {canvas_menu} from "./include/canvas";
import {sel_religion , chosen} from "./include/select";
import {autocomplete} from "./include/autocomplete";
import {menu_js} from "./include/menu";
import {yandex_map_object} from "./include/yandex_map";
import {localDataPicker, datepicker_birthdate} from "./include/datapicker";
import {jscroll} from "./include/jscroll";


document.addEventListener('DOMContentLoaded', function () {

    //console.log(moment().format('LL'))

    upload_f() // pзагрузка файлов (Аватар)
    imask() // маска на поле input input[name="phone"]
    slick() // карусел
    input_label() // input движение label
    _iserror() // input удаление  рамки при error
    close_flash() // закрытие flash
    canvas_menu() // Slidemenu левое меню canvas
    sel_religion() // переключает и перезагружает религию и другое
    autocomplete() // autocomplete-ajax
    menu_js() // манипуляции с меню
    yandex_map_object('43db27ba-be61-4e84-b139-ff37ad4802b8') // карта в объект
    chosen() // стилизованный select
    localDataPicker() // календарик основные настройки
    datepicker_birthdate() // календарь дня рождения
    jscroll() // бесконечный скролл




















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


});
