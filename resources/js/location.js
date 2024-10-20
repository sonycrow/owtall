function formatText()
{
    // Formateamos los textos en listados
    for (let elem of document.getElementsByTagName('td')) {
        elem.innerHTML = elem.innerHTML
            .replaceAll(/\{(.*?)\|(.*?)}/gmi, "<span class='keyword keywork-td keyword-$1'>$2</span>")
            .replaceAll(/\[(.*?)\|(.*?)]/gmi, "<span class='keyword-icon keyword-icon-td keyword-icon-$1'>$2</span>")
            .replaceAll(/\*(.*?)\*/gmi, "<span class='bold bold-td'>$1</span>")
        ;
    }

    // Formateamos textos en cajas de texto de cartas
    for (let elem of document.getElementsByClassName('desc')) {
        elem.innerHTML = elem.innerHTML
            .replaceAll(/\{(.*?)\|(.*?)}/gmi, "<span class='keyword keyword-$1'>$2</span>")
            .replaceAll(/\[(.*?)]/gmi, "<span class='keyword-icon keyword-icon-$1'>&nbsp;&nbsp;</span>")
            .replaceAll(/\*(.*?)\*/gmi, "<span class='bold'>$1</span>")
            .replaceAll(/\+/gmi, "<span class='plus'>+</span>")
            .replaceAll(/\\n/gmi, "<br/>")
    }
}
