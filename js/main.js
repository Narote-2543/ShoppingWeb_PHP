// var currentPath = window.location.pathname;
// var filename = currentPath.substring(currentPath.lastIndexOf("/") + 1);
// console.log("ชื่อไฟล์เอกสารที่เปิดอยู่คือ: " + filename);

document.querySelector('#show-login').addEventListener('click',function(){
    document.querySelector('.popup').classList.add('active');
});
document.querySelector('.popup .close-btn').addEventListener('click',function(){
    document.querySelector('.popup').classList.remove('active');
});
// document.querySelector('#adddata').addEventListener('click',function(){
//     document.querySelector('.popup').classList.add('active');
// });

