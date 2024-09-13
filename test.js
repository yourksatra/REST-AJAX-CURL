function tambah(){
    let x = parseInt(document.getElementById("angka1").value);
    let y = parseInt(document.getElementById("angka2").value);
    document.getElementById("tambah").innerHTML = x + y;
}

function kurang(){
    let x = parseInt(document.getElementById("angka1").value);
    let y = parseInt(document.getElementById("angka2").value);
    document.getElementById("kurang").innerHTML = x - y;
}

function kali(){
    let x = parseInt(document.getElementById("angka1").value);
    let y = parseInt(document.getElementById("angka2").value);
    document.getElementById("kali").innerHTML = x * y;
}

function bagi(){
    let x = parseInt(document.getElementById("angka1").value);
    let y = parseInt(document.getElementById("angka2").value);
    document.getElementById("bagi").innerHTML = x / y;
}

function modulus(){
    let x = parseFloat(document.getElementById("angka1").value);
    let y = parseFloat(document.getElementById("angka2").value);
    document.getElementById("modulus").innerHTML = x%y;
}

function tampilkanQuote() {
    // Menampilkan blockquote dan p dengan ID 'tampil' dan class 'quoteBy'
    document.getElementById('tampil').style.display = 'block';
    document.querySelector('.quoteBy').style.display = 'block';
}