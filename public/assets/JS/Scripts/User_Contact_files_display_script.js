document.getElementById('file-upload').addEventListener('change', function () {
    const file = this.files[0];
    const fileNameDisplay = document.getElementById('file-name');
    const filePreviewContainer = document.getElementById('file-preview');
    const PreviewCon = document.getElementById("preview-con");

    // Clear previous content
    filePreviewContainer.innerHTML = '';
    fileNameDisplay.textContent = '';

    if (file) {
        fileNameDisplay.textContent = `Selected file: ${file.name}`;

        // Extract the file extension
        const fileExtension = file.name.split('.').pop().toLowerCase();

        // Switch statement to handle different file types based on extension
        switch (fileExtension) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                // If the file is an image
                const img = document.createElement('img');
                img.src = URL.createObjectURL(file); // Create object URL for image preview
                filePreviewContainer.appendChild(img);
                PreviewCon.style.display = "flex";
                break;

            case 'txt':
                // If the file is a txt file
                const txtIcon = document.createElement('img');
                txtIcon.src = '/assets/res/Files/txt.png';
                filePreviewContainer.appendChild(txtIcon);
                PreviewCon.style.display = "flex";
                break;

            case 'docx':
                const wordIcon = document.createElement('img');
                wordIcon.src = '/assets/res/Files/docx.png';
                filePreviewContainer.appendChild(wordIcon);
                PreviewCon.style.display = "flex";
                break;
            case 'doc':
                const wordoldIcon = document.createElement('img');
                wordoldIcon.src = '/assets/res/Files/doc.png';
                filePreviewContainer.appendChild(wordoldIcon);
                PreviewCon.style.display = "flex";
                break;

            case 'xlsx':
                const excelIcon = document.createElement('img');
                excelIcon.src = '/assets/res/Files/xlsx.png';
                filePreviewContainer.appendChild(excelIcon);
                PreviewCon.style.display = "flex";
                break;
            case 'xls':
                const exceloldIcon = document.createElement('img');
                exceloldIcon.src = '/assets/res/Files/xls.png';
                filePreviewContainer.appendChild(exceloldIcon);
                PreviewCon.style.display = "flex";
                break;

            case 'mp3':
                const audioIcon = document.createElement('img');
                audioIcon.src = '/assets/res/Files/mp3.png';
                filePreviewContainer.appendChild(audioIcon);
                PreviewCon.style.display = "flex";
                break;
            case 'wav':
                const wavIcon = document.createElement('img');
                wavIcon.src = '/assets/res/Files/wav.png';
                filePreviewContainer.appendChild(wavIcon);
                PreviewCon.style.display = "flex";
                break;
            case 'mp4':
                const videoIcon = document.createElement('img');
                videoIcon.src = '/assets/res/Files/mp4.png';
                filePreviewContainer.appendChild(videoIcon);
                PreviewCon.style.display = "flex";
                break;

            case 'mdb':
                const accessIcon = document.createElement('img');
                accessIcon.src = '/assets/res/Files/mdb.png';
                filePreviewContainer.appendChild(accessIcon);
                PreviewCon.style.display = "flex";
                break;
            case 'accdb':
                const accdbIcon = document.createElement('img');
                accdbIcon.src = '/assets/res/Files/accdb.png';
                filePreviewContainer.appendChild(accdbIcon);
                PreviewCon.style.display = "flex";
                break;
            case 'pdf':
                const pdfIcon = document.createElement('img');
                pdfIcon.src = '/assets/res/Files/pdf.png';
                filePreviewContainer.appendChild(pdfIcon);
                PreviewCon.style.display = "flex";
                break;
            case 'exe':
                const exeIcon = document.createElement('img');
                exeIcon.src = '/assets/res/Files/exe.png';
                filePreviewContainer.appendChild(exeIcon);
                PreviewCon.style.display = "flex";
                break;

            default:
                const defaultIcon = document.createElement('img');
                defaultIcon.src = '/assets/res/Files/file.png';
                filePreviewContainer.appendChild(defaultIcon);
                PreviewCon.style.display = "flex";
                break;
        }
    } else {
        // Hide preview container if no file is selected
        PreviewCon.style.display = "none";
    }
});


document.getElementById('file-upload').addEventListener('change', function () {
    const file = this.files[0];
    const maxSize = 16 * 1024 * 1024; // 16 MB in bytes
    const errorContainer = document.querySelector('.file-error');

    if (file && file.size > maxSize) {
        errorContainer.textContent = 'Warning : The uploaded file exceeds the maximum size of 16 MB. This file will NOT be sent.';
        this.value = ''; // Clear the input
    } else {
        errorContainer.textContent = ''; // Clear previous error
    }
});
