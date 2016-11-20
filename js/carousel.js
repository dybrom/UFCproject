


	var mainImage = document.getElementById('mainImage');
	var mainImageCaption = document.getElementById('mainImageCaption');

	var imageArray = ["UFC_100.jpg", "UFC_101.jpg", "UFC_102.jpg"];
	var captionArray = ["UFC 100", "UFC 101", "UFC 102"];

	var imageIndex = 1;
	var captionIndex = 1;



function changeImage() {
	mainImage.setAttribute("src", imageArray[imageIndex]);
	mainImage.setAttribute("alt", captionArray[captionIndex]);
	mainImageCaption.innerHTML = captionArray[captionIndex];
	imageIndex++;
	captionIndex++;
	if(imageIndex>= imageArray.length) {
		imageIndex = 0;
		captionIndex = 0;
	}
}

var rotateAction = setInterval(changeImage, 5000);

mainImage.onmouseover = function() {
	clearInterval(rotateAction);
}

mainImage.onmouseout = function () {
	rotateAction = setInterval(changeImage, 5000);
}