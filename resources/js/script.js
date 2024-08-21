
import { upload_f,upload_photo } from './include/ajax';
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
import {grid} from "./include/image-loaded";


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
    upload_photo() // загрузка фото на стронице use
    grid() //





});
