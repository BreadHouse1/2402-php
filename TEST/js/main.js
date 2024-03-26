const textarea = document.getElementById('myTextarea');

textarea.addEventListener('input', function() {
    const lines = textarea.value.length;
    const maxLines = 10;
    if (lines > maxLines) {
        textarea.value = textarea.value.slice(0, maxLines);
    }
});