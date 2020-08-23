$('#Date').datepicker({
    dateFormat: 'yy-mm-dd',
    minDate: 0
});
$("#Date").keypress(e => {
    e.preventDefault();
});

const serviceCenter = $('#serviceFormUser #ServiceCenter');
const datepicker = $('#serviceFormUser #Date');
const timeslot = $('#serviceFormUser #Timeslot');
enableDisable();

serviceCenter.change(function () {
    enableDisable();
    ajaxcall();
});
datepicker.change(function () {
    enableDisable();
    ajaxcall();
});

function enableDisable() {
    if (serviceCenter[0].value == '')
        datepicker.prop("disabled", true);
    else
        datepicker.prop("disabled", false);
    if (datepicker.prop('disabled') == true || datepicker[0].value == '')
        timeslot.prop("disabled", true);
    else
        timeslot.prop("disabled", false);
}

function ajaxcall() {
    $.ajax({
        url: 'http://mvcexam.localhost/user/services/getTimeslot',
        type: 'POST',
        data: {
            ServiceCenter: serviceCenter[0].value,
            Date: datepicker[0].value,
        },
        success: function (data) {
            var timeslotData = JSON.parse(data);
            timeslot.empty();
            timeslot.append($("<option></option>")
                .attr("value", "").text("Select Timeslot"));
            $.each(timeslotData, function (key, value) {
                timeslot.append($("<option></option>")
                    .attr("value", value).text(value));
            });
        }
    });
}