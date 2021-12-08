function pageUrlHandler(url) {
	let letters = /^[a-zA-Z]+$/,
		lastChar = url.slice(-1);

	if (lastChar.match(letters) === null) {
		return {
			url: url.slice(0, -1),
			status: false,
		};
	}

	return {
		url: url,
		status: true,
	};
}

function getPageUrl() {
	let url = $(location).attr("href"),
		status = false;

	while (status === false) {
		let checkUrl = pageUrlHandler(url);

		status = checkUrl.status;

		url = checkUrl.url;
	}

	return url;
}

String.prototype.escape = function () {
	let tagsToReplace = {
		"&": "&amp;",
		"<": "&lt;",
		">": "&gt;",
	};
	return this.replace(/[&<>]/g, (tag) => {
		return tagsToReplace[tag] || tag;
	});
};

const BASE_URL = $('meta[name="url"]').attr("content"),
	PAGE_URL = getPageUrl();

let csrfName = $(".csrf").attr("data-name"),
	csrfHash = $(".csrf").attr("data-hash"),
	onSubmit = false;

$("form").submit(function (e) {
	if (onSubmit) {
		e.preventDefault();
		$(this).find('button[type="submit"]').attr("type", "button");

		return;
	}

	onSubmit = true;
});
