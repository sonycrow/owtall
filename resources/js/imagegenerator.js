export default () => ({

    downloadData: false,

    download() {
        this.downloadData = ! this.downloadData
    },

    generate() {
        let nodes = document.getElementsByClassName('block-image');
        let downloadData = this.downloadData;

        Array.from(nodes).forEach((node) => {
            // Configuración
            let blockId = node.getAttribute("data-blockid");

            htmltoimage.toPng(node)
                .then(function (dataUrl) {
                    let img = new Image();
                    img.src = dataUrl;

                    // Descarga de imagenes
                    if (downloadData) {
                        img.onclick = function () {
                            let link = document.createElement('a');
                            link.download = blockId + '.png';
                            link.href = dataUrl;
                            link.click();
                        };
                    }

                    document.getElementById("block-" + blockId).appendChild(img);
                    node.remove();
                })
                .catch(function (error) {
                    console.error('oops, something went wrong!', error);
                });
        });
    }
})
