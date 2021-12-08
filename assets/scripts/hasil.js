let selectK = $("#nilaiK"),
	nilaiK =
		selectK.length > 0 ? selectK.children("option:selected").val() : false,
	chartLabels = [],
	chartData = [];

function chartHandler(data) {
	let k = parseInt(nilaiK),
		chartLabels = [];

	for (let index = 0; index < k; index++) {
		chartLabels[index] = `K${index + 1}`;
		chartData[index] = data.hasil_sortir[index].jarak;
	}

	let areaChartData = {
		labels: chartLabels,
		datasets: [
			{
				label: "Jarak Data",
				backgroundColor: "rgba(60,141,188,0.9)",
				borderColor: "rgba(60,141,188,0.8)",
				pointRadius: false,
				pointColor: "#3b8bba",
				pointStrokeColor: "rgba(60,141,188,1)",
				pointHighlightFill: "#fff",
				pointHighlightStroke: "rgba(60,141,188,1)",
				data: chartData,
			},
		],
	};

	let areaChartOptions = {
		maintainAspectRatio: false,
		responsive: true,
		legend: {
			display: true,
		},
		scales: {
			xAxes: [
				{
					gridLines: {
						display: true,
					},
				},
			],
			yAxes: [
				{
					gridLines: {
						display: true,
					},
				},
			],
		},
	};

	let lineChartCanvas = $("#lineChart").get(0).getContext("2d");
	let lineChartOptions = jQuery.extend(true, {}, areaChartOptions);
	let lineChartData = jQuery.extend(true, {}, areaChartData);
	lineChartData.datasets[0].fill = false;
	lineChartOptions.datasetFill = false;

	let lineChart = new Chart(lineChartCanvas, {
		type: "line",
		data: lineChartData,
		options: lineChartOptions,
	});
}

function randomRgb() {
	var o = Math.round,
		r = Math.random,
		s = 255;
	return "" + o(r() * s) + "," + o(r() * s) + "," + o(r() * s) + ",";
}

async function getData(nilaiK) {
	let result;

	try {
		result = await $.ajax({
			url: `${BASE_URL}hasil/getSortir`,
			type: "GET",
			data: {
				k: nilaiK,
			},
			dataType: "json",
		});

		return result;
	} catch (error) {}
}

async function dataHandler() {
	if (nilaiK > 10 || !parseInt(nilaiK)) {
		return;
	}

	const data = await getData(nilaiK);

	if (!data) {
		return;
	}

	tableHandler(data, nilaiK);

	chartHandler(data, nilaiK);
}

function tableHandler(data, nilaiK) {
	$("#sortirTable tbody").empty();

	$.each(data.hasil_sortir, (key, value) => {
		$("#sortirTable tbody").append(
			`<tr class="text-center${
				value.kategori == data.kesimpulan && key < nilaiK ? " bg-light" : ""
			}">`
		);

		$.each(value.sampel, (key2, value2) => {
			$("#sortirTable tbody").append(`
                <td class="align-middle text-center${
									value.kategori == data.kesimpulan && key < nilaiK
										? " bg-light"
										: ""
								}">${value2.nilai}</td>
            `);
		});

		$("#sortirTable tbody").append(`
            <td class="align-middle text-center${
							value.kategori == data.kesimpulan && key < nilaiK
								? " bg-light"
								: ""
						}">${value.jarak}</td>
            <td class="align-middle text-center${
							value.kategori == data.kesimpulan && key < nilaiK
								? " bg-light"
								: ""
						}">${value.kategori}</td>
        `);

		$("#sortirTable tbody").append(`</tr>`);
	});

	$("#kesimpulan b").text(data.kesimpulan);
}

if (nilaiK) {
	dataHandler();
}

$("#nilaiK").change(function () {
	nilaiK = $(this).children("option:selected").val();

	dataHandler();
});
