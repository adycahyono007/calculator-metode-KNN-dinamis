$("#datatable-table").DataTable();

async function getData(id) {
	let result;

	try {
		result = await $.ajax({
			url: `${BASE_URL}sampel/getById`,
			type: "GET",
			data: {
				id: id,
			},
			dataType: "json",
		});

		return result;
	} catch (error) {}
}

function errorHandler() {
	setTimeout(() => {
		$("#edit-modal").modal("hide");
		$("#content").before(`
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error.</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        `);
	}, 500);
}

async function editModalHandler(id) {
	editLoader(true);
	$("#edit-modal").modal("show");

	const data = await getData(id);

	if (!data) {
		errorHandler();
		return;
	}

	$.each(data, (key, value) => {
		$(`#edit-form input[name="nilai[${value.id_variabel}]"]`).val(value.nilai);
	});

	$("#edit-form").attr("action", `${BASE_URL}sampel/${id}`);

	editLoader(false);
}

function editLoader(active) {
	if (!active) {
		$("#edit-loader").removeClass("d-flex");
		$("#edit-loader").addClass("d-none");
	} else {
		$("#edit-loader").addClass("d-flex");
		$("#edit-loader").removeClass("d-none");
	}
}

$("body").on("click", ".edit-btn", function () {
	let id = $(this).data("id");
	editModalHandler(id);
});
