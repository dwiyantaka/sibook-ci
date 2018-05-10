<script>
  $(document).ready(function(){
      $('.tampilkanModal').click(function(){
          $('#Modal').modal('show');
      });
      $('.tutupModal').click(function(){
          $('#Modal').modal('hide');
      });

      $('#calendar').fullCalendar({
        defaultView : 'listWeek',
        //height : 590,
        header    : {
          left  : 'prev,next today',
          center: 'title',
          right : 'month,agendaWeek,agendaDay'
        },
        buttonText: {
          today: 'today',
          month: 'month',
          week : 'week',
          day  : 'day'
        },

        eventSources    : [
          {
            url  : 'queryCode/getJadwal.php',
            type : 'POST',
            color: '#f56954', //red
            textColor    : 'white',
          },
        ],
        timeFormat : 'H(:mm)',
        slotLabelFormat:'HH:mm',
        eventClick:  function(event, jsEvent, view) {
              var awal = moment(event.start).format("HH:mm");
              var akhir = moment(event.end).format("HH:mm");

              $('#modalTitle').html(event.title);
              $('#bidang').html('Rapat Bidang : <b>'+event.bidang+'</b>');
              $('#jam').html('Pukul <b>'+awal+' s/d '+akhir+'</b>');
              $('#ruang').html('di <b>'+event.ruang+'</b>');
              $('#keterangan').html(event.description);
              $('#eventUrl').attr('href',event.url);
              $('#fullCalModal').modal();
          }
        });
      $('#listCal').fullCalendar({
        defaultView: 'listWeek',
        height : 490,
        eventSources    : [
          {
            url  : base_url+'admin/getJadwal',
            type : 'post',
            //color: '#f56954', //red
            textColor    : 'white',
          },
        ],
        eventClick:  function(event, jsEvent, view) {
              var awal = moment(event.start).format("HH:mm");
              var akhir = moment(event.end).format("HH:mm");

              $('#modalTitle').find('h3').remove();
              $('#modalTitle').append('<h3 class="modal-title" style="color: '+event.color+' ">'+event.title+'</h3>');
              //$('#modalTitle').css('textColor', color);
              $('#bidang').html('<b>'+event.bidang+'</b>');
              $('#jam').html('Pukul <b>'+awal+' s/d '+akhir+'</b>');
              $('#ruang').html('di <b>'+event.ruang+'</b>');
              $('#keterangan').html(event.description);
              $('#eventUrl').attr('href',event.url);
              $('#fullCalModal').modal();
          }
      })
  });

  function getRandomColor(){
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i=0; i<6; i++){
      color += letters[Math.floor(Math.random()*16)];
    }
    return color;
  }

  function setRandomColor(){
    $('#colorpad').css("background-color", getRandomColor());
    //alert(getRandomColor());
  }

  function tampilSwal(){
    swal("Hello World!");
  }

  function swalSuccess(){
    swal("Tersimpan", "Data sukses tersimpan", "success");
  }

  function swalWarning(){
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });
  }
</script>
</body>
</html>
