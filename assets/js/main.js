document.documentElement.classList.remove("no-js");

//TODO: Check for null to remove JS error
// window.addEventListener("DOMContentLoaded", () => {
// 	// collect all anchor elements in the document body
// 	const links = document.querySelectorAll("header ~ * a");
// 	links.forEach((l) => {
// 		// if the link points to another site and it's not a phone or email link
// 		// mark it as an external link
// 		if (
// 			l.host != window.location.host &&
// 			!l.getAttribute("href").includes("tel") &&
// 			!l.getAttribute("href").includes("mailto")
// 		) {
// 			l.classList.add("external-link");
// 		}
// 	});
// });
