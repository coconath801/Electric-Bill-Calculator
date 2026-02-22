function validateForm() {
    let prev = parseFloat(document.getElementById("prev").value);
    let curr = parseFloat(document.getElementById("curr").value);

    if(curr < prev) {
        alert("Invalid Reading: Current reading cannot be lower than previous.");
        return false;
    }
    return true;
}
