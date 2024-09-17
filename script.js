const dropArea=document.getElementById("drop-area");
const inputFile=document.getElementById("input-file");
const imageView=document.getElementById("img-view");

inputFile.addEventListener("change",uploadImage);
function uploadImage(){
    let imLink=URL.createObjectURL(inputFile.files[0]);
    imageView.style.backgroundImage=`url(${imLink})`;
    imageView.textContent="";
    imageView.style.border=0;
}
dropArea.addEventListener("dragover",function(e){
    e.preventDefault();
});
dropArea.addEventListener("drop",function(e){
    e.preventDefault();
    inputFile.files=e.dataTransfer.files;
    uploadImage();

});