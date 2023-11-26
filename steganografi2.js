function encode() {
    var imageInput = document.getElementById("imageInput");
    var messageInput = document.getElementById("messageInput");
    var resultImage = document.getElementById("resultImage");

    var imageFile = imageInput.files[0];
    var message = messageInput.value;

    if (imageFile && message) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var image = new Image();
            image.src = e.target.result;

            image.onload = function () {
                var canvas = document.createElement("canvas");
                var ctx = canvas.getContext("2d");
                canvas.width = image.width;
                canvas.height = image.height;

                ctx.drawImage(image, 0, 0);

                // Encode the message
                encodeMessage(ctx, message);

                // Display the result image
                resultImage.src = canvas.toDataURL("image/png");

                // Create a download link
                var downloadLink = document.createElement("a");
                downloadLink.href = resultImage.src;
                downloadLink.download = "encoded_image.png";

                // Trigger a click on the download link
                downloadLink.click();

                // Remove the download link
                document.body.removeChild(downloadLink);
            };
        };
        reader.readAsDataURL(imageFile);
    } else {
        alert("Please select an image and enter a message.");
    }
}

function decode() {
    
    var resultImage = document.getElementById("dekripImg");

    var canvas = document.createElement("canvas");
    var ctx = canvas.getContext("2d");
    canvas.width = resultImage.width;
    canvas.height = resultImage.height;

    ctx.drawImage(resultImage, 0, 0);

    // Decode the message
    var decodedMessage = decodeMessage(ctx);
    console.log(decodeMessage);
    alert("Decoded Message: " + decodedMessage);
}

function encodeMessage(ctx, message) {
    var imageData = ctx.getImageData(0, 0, ctx.canvas.width, ctx.canvas.height);
    var data = imageData.data;

    var messageBinary = stringToBinary(message);

    var messageIndex = 0;

    for (var i = 0; i < data.length; i += 4) {
        // Modify the least significant bit
        data[i] = (data[i] & 0xFE) | parseInt(messageBinary[messageIndex++], 2);
    }

    ctx.putImageData(imageData, 0, 0);
}

function decodeMessage(ctx) {
    var imageData = ctx.getImageData(0, 0, ctx.canvas.width, ctx.canvas.height);
    var data = imageData.data;

    var binaryMessage = "";

    for (var i = 0; i < data.length; i += 4) {
        // Extract the least significant bit
        binaryMessage += (data[i] & 1).toString();
    }

    return binaryToString(binaryMessage);
}

function stringToBinary(str) {
    var binary = "";
    for (var i = 0; i < str.length; i++) {
        binary += str[i].charCodeAt(0).toString(2).padStart(8, "0");
    }
    return binary;
}

function binaryToString(binary) {
    var str = "";
    for (var i = 0; i < binary.length; i += 8) {
        str += String.fromCharCode(parseInt(binary.substr(i, 8), 2));
    }
    return str;
}

function unduhGambar()
{
    // Mendapatkan referensi elemen gambar
    var image = document.getElementById("resultImage");

    // Membuat elemen <canvas> untuk menggambar gambar
    var canvas = document.createElement("canvas");
    var context = canvas.getContext("2d");
    canvas.width = image.width;
    canvas.height = image.height;
    context.drawImage(image, 0, 0, image.width, image.height);

    // Mengambil data gambar dalam format data URL
    var dataURL = canvas.toDataURL("image/jpeg");

    // Membuat link <a> untuk mengunduh gambar
    var downloadLink = document.createElement("a");
    downloadLink.href = dataURL;
    downloadLink.download = "downloaded_image.jpg";

    // Simulasi klik pada link untuk mengunduh gambar
    downloadLink.click();
}

