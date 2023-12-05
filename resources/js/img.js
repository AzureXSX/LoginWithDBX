import { getBuffer } from "azure-x-lib";
import { encode } from "uint8-to-base64";

const img_input = document.getElementById("img-input-x");

img_input.onchange = async (evt) => {
    var tgt = evt.target;

    var files = tgt.files;

    var fileData = new Blob([files[0]]);

    if (fileData.size > 9) {
        var promise = new Promise(getBuffer(fileData));
        await promise
          .then(async function (data) {
            const b64encoded = encode(data);
            document.getElementById("bg-x-img").style.backgroundImage = "url(data:image/png;base64," + b64encoded + ")";        
          });
      }

};

function SelectImg() {
    document.getElementById('bg-x-img').style.border = "0px solid aqua";
    img_input.click();
}

window.SelectImg = SelectImg;
