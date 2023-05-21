<?= $this->extend('layouts/header-main') ?>
<?= $this->section('title') ?>Table about meeting room<?= $this->endSection() ?>
<?= $this->section('header-content') ?>
<link rel="stylesheet" href="<?= base_url("style/fullcalendar.min.css"); ?>">
<script src="<?= base_url("script/moment.min.js"); ?>"></script>
<script src="<?= base_url("script/fullcalendar.min.js"); ?>"></script>
<style>
  #calendar {
    width: 700px;
    margin: 0 auto;
  }

  .response {
    height: 60px;
  }

  .success {
    background: #cdf3cd;
    padding: 10px 60px;
    border: #c3e6c3 1px solid;
    display: inline-block;
  }
</style>
<script>
  $(document).ready(function() {
    var calendar = $('#calendar').fullCalendar({
      editable: true,
      events: "fetch-event.php",
      displayEventTime: false,
      eventRender: function(event, element, view) {
        if (event.allDay === 'true') {
          event.allDay = true;
        } else {
          event.allDay = false;
        }
      },
      selectable: true,
      selectHelper: true,
      select: function(start, end, allDay) {
        var title = prompt('Event Title:');

        if (title) {
          var start = $.fullCalendar.formatDate(start, "yyyy-mm-dd HH:mm:ss");
          var end = $.fullCalendar.formatDate(end, "yyyy-mm-dd HH:mm:ss");

          $.ajax({
            url: 'add-event.php',
            data: 'title=' + title + '&start=' + start + '&end=' + end,
            type: "POST",
            success: function(data) {
              displayMessage("Added Successfully");
            }
          });
          calendar.fullCalendar('renderEvent', {
              title: title,
              start: start,
              end: end,
              allDay: allDay
            },
            true
          );
        }
        calendar.fullCalendar('unselect');
      },

      // when move
      editable: true,
      eventDrop: function(event, delta) {
        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
        $.ajax({
          url: 'edit-event.php',
          data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
          type: "POST",
          success: function(response) {
            displayMessage("Updated Successfully");
          }
        });
      },

      // when click event
      eventClick: function(event) {
        var deleteMsg = confirm("Do you really want to delete?");
        if (deleteMsg) {
          $.ajax({
            type: "POST",
            url: "delete-event.php",
            data: "&id=" + event.id,
            success: function(response) {
              if (parseInt(response) > 0) {
                $('#calendar').fullCalendar('removeEvents', event.id);
                displayMessage("Deleted Successfully");
              }
            }
          });
        }
      }

    });
  });

  function displayMessage(message) {
    $(".response").html("<div class='success'>" + message + "</div>");
    setInterval(function() {
      $(".success").fadeOut();
    }, 1000);
  }
</script>
<div class="container">
  <div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-10">
      <h5 class="text-center my-5">ปฏิทิน</h5>
      <div class="response"></div>
      <div id='calendar'></div>
    </div>
    <div class="col-lg-1"></div>
  </div>
</div>
<?= $this->endSection() ?>