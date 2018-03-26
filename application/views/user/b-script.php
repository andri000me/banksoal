<!-- b-scrip -->
  <!-- Modals need jQuery and Bootstrap-->
	<!-- jQuery 2.1.4 -->
	<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- Bootstrap 3.3.5 -->
	<script src="<?php echo base_url('assets/adminlte'); ?>/bootstrap/js/bootstrap.min.js"></script>
	<!-- iCheck -->
	<script src="<?php echo base_url('assets/adminlte'); ?>/plugins/iCheck/icheck.min.js"></script>

  <!-- Add per page -->
  <!-- DataTables -->
  <?php 
  if ($page=='home') {
  ?>

  <?php 
  }else if ($page=='create') {
  ?>
    <!-- Select2 -->
    <script src="<?php echo base_url('assets/adminlte'); ?>/plugins/select2/select2.full.min.js"></script>
    
    <!-- Page Script -->
    <script>
    $(function(){
      $(".select2").select2();

      //Select year
      var today=new Date();
      var year=today.getFullYear();
      for(i=year;i>=2000;i--){
        var option=$("<option></option>").text(i).val(i);
        $("#tahun").append(option);  
      }
      //End of select year
      
      $(document).on('change','#waktuInput',function(){
        var wInput=parseInt($("#waktuInput").val());
        jam=parseInt(wInput/60);
        menit=wInput%60;

        if(wInput>0){
          teks="(";
          if(jam!=0){
            teks+=jam+" jam";
            if(menit!=0){
              teks+=" ";    
            }
          }
          if(menit!=0){
            teks+=menit+" menit";
          }
          teks+=")";
        }else{
          teks="";
        }

        $("#waktu").text(teks);

        if($('.select2-selection__rendered').text()=='pilih tahun pembuatan'){
          $('.select2-selection__rendered').css('color','red');
        }
      });

      $(document).on('change','#penilaian',function(){
        var info='<div class="callout info-penilaian"><p id="info-penilaian"></p></div>';
        $('.info-penilaian').replaceWith(info);

        var rule=$('#penilaian').val();
        if(rule==1){
          var text='<b>skor</b> = (jumlah jawaban benar &times; 1) &#247; jumlah soal &times; 100';
        }else if(rule==2){
          var text='<b>skor</b> = {( jumlah jawaban benar &times; 4 ) + ( jumlah jawaban salah &times; -1 )} &#247; { jumlah soal &times; 4 } &times; 100';
        }
        $('#info-penilaian').append(text);
      });
    });
    </script>
  <?php
  }else if($page=='matter_details'){
  ?>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo base_url('assets/adminlte'); ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

    <!-- page script -->
    <script>
      $(function () {
        //Waktu Pengerjaan
        var wInput=parseInt(<?php echo $matter->row()->mach_time; ?>);
        jam=parseInt(wInput/60);
        menit=wInput%60;

        if(wInput>0){
          teks="";
          if(jam!=0){
            teks+=jam+" jam";
            if(menit!=0){
              teks+=" ";    
            }
          }
          if(menit!=0){
            teks+=menit+" menit";
          }
        }else{
          teks="";
        }
        $("#waktu").text(teks);

        $("#example1").DataTable();
      });

      //HTML elements
      var tny='<div class="form-group pertanyaan-teks"><label for="">Pertanyaan</label><textarea name="pertanyaan" from="tambah-pertanyaan" class="textarea form-control" style="width: 100%; height: 150px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" placeholder="Masukan pertanyaan . . ." required></textarea></div>';
      var fno='<div class="form-group format-no"><label for="">Format Penomoran</label><select name="format_no" class="form-control" required><option value="" selected="selected" disabled="disabled">Pilih format penomoran . . .</option><option value="1">a, b, c, d, . . .</option><option value="2">A, B, C, D, . . .</option><option value="3">1, 2, 3, 4, . . .</option></select></div>';
      var pil='<div class="form-group pilihan"><span class="pilihan-label"></span><input type="hidden" name="id_chc[]" value="" readonly="readonly"><textarea name="pilihan[]" from="tambah-pertanyaan" class="textarea form-control" style="width: 100%; height: 70px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" placeholder="Masukan pertanyaan . . ." required></textarea></div>';
      var knc='<div class="form-group kunci"><label for="">Kunci Jawaban</label><select name="kunci" class="form-control" required><option value="" selected="selected" disabled="disabled">Pilih kunci jawaban . . .</option></select></div>';

      function tambahPertanyaan(){
        $('input[name="id_qst"]').removeAttr("required");
        $('input[name="id_qst"]').attr({'value':'','readonly':'readonly'});

        $(tny).insertBefore('.jawaban');
        $(fno).insertBefore('.jawaban');
        $(knc).insertBefore('.jawaban');

        $('.jawaban').append(pil);
        $('.pilihan-label').last().text('Pilihan '+$('.pilihan').last().index());
        $('select[name="kunci"]').append('<option value="'+$('.pilihan').last().index()+'">'+$('.pilihan-label').last().text()+'</option>');

        $('.jawaban').append(pil);
        $('.pilihan-label').last().text('Pilihan '+$('.pilihan').last().index());
        $('select[name="kunci"]').append('<option value="'+$('.pilihan').last().index()+'">'+$('.pilihan-label').last().text()+'</option>');

        $(".textarea").wysihtml5();

        $(".pertanyaan").css("display","inline");
        $(".pertanyaan-x").css("display","none");
      }

      function pertanyaanX(){
        $('.pertanyaan-teks').remove();
        $('.format-no').remove();
        $('.kunci').remove();
        $('.pilihan').remove();

        $(".pertanyaan").css("display","none");
        $(".pertanyaan-x").css("display","inline");
      }

      function tambahPilihan(){
        $('.pilihan').last().after(pil);
        $('.pilihan-label').last().text('Pilihan '+$('.pilihan').last().index());
        $('select[name="kunci"]').append('<option value="'+$('.pilihan').last().index()+'">'+$('.pilihan-label').last().text()+'</option>');
        
        if($('.pilihan').last().index()>2){
          $('.hapus-pilihan').css('display','inline');
        }

        if($('.pilihan').last().index()==5){
          $('.tambah-pilihan').css('display','none');
        }

        $(".textarea").last().wysihtml5();
      }

      function hapusPilihan(){
        $('.pilihan').last().remove();
        $('select[name="kunci"] option').last().remove();

        if($('.pilihan').last().index()==2){
          $('.hapus-pilihan').css('display','none'); 
        }

        if($('.pilihan').last().index()<5){
          $('.tambah-pilihan').css('display','inline');
        }
      }

      function editSoal(id_qst){
        pertanyaanX();

        var url="<?php echo base_url('question_ID'); ?>"+"/"+id_qst;
        $.getJSON(url,function(result)
        {
          $('input[name="id_qst"]').removeAttr("readonly");
          $('input[name="id_qst"]').attr({'value':result['id_qst'],'required':'required'});

          $(tny).insertBefore('.jawaban');
          $(fno).insertBefore('.jawaban');
          $(knc).insertBefore('.jawaban');

          $('.pertanyaan-teks textarea').text(result['text_qst']);
          $('.format-no select option[selected="selected"]').remove();
          $('select[name="kunci"] option[selected="selected"]').last().remove();
          $('.format-no select option[value="'+result['num_type']+'"]').attr("selected","selected");

          $(".pertanyaan-teks textarea").wysihtml5();

          $(".pertanyaan").css("display","inline");
          $(".pertanyaan-x").css("display","none");
        });

        var url="<?php echo base_url('choice_IDQst'); ?>"+"/"+id_qst;
        $.getJSON(url,function(result){
          $.each(result, function(i, field)
          {
            $('.jawaban').append(pil);
            $('.pilihan-label').last().text('Pilihan '+$('.pilihan').last().index());
            $('select[name="kunci"]').append('<option value="'+$('.pilihan').last().index()+'">'+$('.pilihan-label').last().text()+'</option>');
            if(field['score']==1){
               $('select[name="kunci"] option').last().attr('selected','selected');
            }
            $('.textarea[name="pilihan[]"]').last().text(field['text_chc']);
            $('input[name="id_chc[]"]').last().removeAttr("readonly");
            $('input[name="id_chc[]"]').last().attr({'value':field['id_chc'],'required':'required'});

            $(".textarea").last().wysihtml5();

            if($('.pilihan').last().index()>2){
              $('.hapus-pilihan').css('display','inline');
            }

            if($('.pilihan').last().index()==5){
              $('.tambah-pilihan').css('display','none');
            }
          });
        });

        var url="<?php echo base_url('n_choice_IDQst'); ?>"+"/"+id_qst;
        $.getJSON(url,function(result){
          for(i=result;i<2;i++){
            $('.jawaban').append(pil);
            $('.pilihan-label').last().text('Pilihan '+$('.pilihan').last().index());
            $('select[name="kunci"]').append('<option value="'+$('.pilihan').last().index()+'">'+$('.pilihan-label').last().text()+'</option>');
            $('.textarea[name="pilihan[]"]').last().wysihtml5();
          }
        });
      }

      function hapusSoal(link){
        alert('Soal akan dihapus!');
        window.location=link;
      }
    </script>
  <?php 
  }else if($page=='edit'){
  ?>
    <!-- Select2 -->
    <script src="<?php echo base_url('assets/adminlte'); ?>/plugins/select2/select2.full.min.js"></script>
    
    <!-- Page Script -->
    <script>
    $(function(){
      $(".select2").select2();

      var matter=<?php echo json_encode($matter->row()); ?>;
      $('#jenjang-'+matter['edu_lv']).attr("selected","selected");
      $('#penilaian option[value="'+matter['role_type']+'"]').attr("selected","selected");

      //Select year
      var today=new Date();
      var year=today.getFullYear();
      for(i=year;i>=2000;i--){
        var option=$("<option></option>").text(i).val(i);
        $("#tahun").append(option);  
      }
      //End of select year
      
      $(document).on('change','#waktuInput',function(){
        var wInput=parseInt($("#waktuInput").val());
        jam=parseInt(wInput/60);
        menit=wInput%60;

        if(wInput>0){
          teks="(";
          if(jam!=0){
            teks+=jam+" jam";
            if(menit!=0){
              teks+=" ";    
            }
          }
          if(menit!=0){
            teks+=menit+" menit";
          }
          teks+=")";
        }else{
          teks="";
        }

        $("#waktu").text(teks);
      });

      $(document).on('change','#penilaian',function(){
        var info='<div class="callout info-penilaian"><p id="info-penilaian"></p></div>';
        $('.info-penilaian').replaceWith(info);

        var rule=$('#penilaian').val();
        if(rule==1){
          var text='<b>skor</b> = (jumlah jawaban benar &times; 1) &#247; jumlah soal &times; 100';
        }else if(rule==2){
          var text='<b>skor</b> = {( jumlah jawaban benar &times; 4 ) + ( jumlah jawaban salah &times; -1 )} &#247; jumlah soal &times; 100';
        }
        $('#info-penilaian').append(text);
      });
    });
    </script>
  <?php 
    }else if($page=='matter_description'){
  ?>
    <!-- page script -->
    <script>
      $(function () {
        //Waktu Pengerjaan
        var wInput=parseInt(<?php echo $matter->row()->mach_time; ?>);
        jam=parseInt(wInput/60);
        menit=wInput%60;

        if(wInput>0){
          teks="";
          if(jam!=0){
            teks+=jam+" jam";
            if(menit!=0){
              teks+=" ";    
            }
          }
          if(menit!=0){
            teks+=menit+" menit";
          }
        }else{
          teks="";
        }
        $("#waktu").text(teks);

        <?php if($subpage==1){ ?>
        $('.pilihan').each(function(){
          var pil=$(this); //tampung pada variable karena akan masuk selector lain
          var id_qst=$(pil).text(); //!

          var url="<?php echo base_url('question_ID'); ?>"+"/"+id_qst;
          $.getJSON(url,function(result){
            if(result['num_type']==1){
              var nomor="abcde";
            }else if(result['num_type']==2){
              var nomor="ABCDE";
            }else if(result['num_type']==3){
              var nomor="12345";
            }

            var url="<?php echo base_url('choice_IDQst'); ?>"+"/"+$(pil).text();
            $(pil).empty();
            $.getJSON(url,function(result){
              $.each(result, function(i, field)
              {
                var pilihan='<div class="col-lg-12"><div class="col-lg-1" align="right"></div><div class="col-lg-1" align="right">'+nomor[$(pil).children().last().index()+1]+'. </div><div class="col-lg-10">'+field['text_chc']+'</div></div>';
                $(pil).append(pilihan);
              });
            });

            $(pil).css("display","inline");
          });
        });
        <?php }else if($subpage==3){ ?>
        $('.pilihan').each(function(){
          var pil=$(this); //tampung pada variable karena akan masuk selector lain
          var id_qst=$(pil).text();

          var url="<?php echo base_url('question_ID'); ?>"+"/"+id_qst;
          $.getJSON(url,function(result){
            if(result['num_type']==1){
              var nomor="abcde";
            }else if(result['num_type']==2){
              var nomor="ABCDE";
            }else if(result['num_type']==3){
              var nomor="12345";
            }

            var url="<?php echo base_url('choice_IDQst'); ?>"+"/"+id_qst;
            $(pil).empty();
            $.getJSON(url,function(result){
              $.each(result, function(i, field)
              {
                var rad='<input type="radio" class="f-radpil" name="pil['+$(pil).index('.pilihan')+']" value="'+field['id_chc']+'"> ';
                var pilihan='<div class="col-lg-12"><div class="col-lg-2" align="right">'+rad+nomor[$(pil).children().last().index()+1]+'. </div><div class="col-lg-10">'+field['text_chc']+'</div></div>';
                $(pil).append(pilihan);

                $('.f-radpil').iCheck({
                  radioClass: 'iradio_square-green',
                  increaseArea: '20%' // optional
                });
              });
            });

            $(pil).css("display","inline");
          });          
        });

        //CountDown
        function getTimeRemaining(endtime) {
          var t = Date.parse(endtime) - Date.parse(new Date());
          var seconds = Math.floor((t / 1000) % 60);
          var minutes = Math.floor((t / 1000 / 60) % 60);
          var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
          var days = Math.floor(t / (1000 * 60 * 60 * 24));
          
          return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
          };
        }

        function initializeClock(id, endtime) {
          var clock = document.getElementById(id);
          var daysSpan = clock.querySelector('.days');
          var hoursSpan = clock.querySelector('.hours');
          var minutesSpan = clock.querySelector('.minutes');
          var secondsSpan = clock.querySelector('.seconds');

          function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            document.title = ('0' + t.hours).slice(-2)+' : '+('0' + t.minutes).slice(-2)+' : '+('0' + t.seconds).slice(-2)+' - BankSoal';

            if (t.total <= 0) {
              clearInterval(timeinterval);

              $('#tryout').find('input[type="submit"]').trigger('click');
            }
          }

          updateClock();
          var timeinterval = setInterval(updateClock, 1000);
        }

        var cTime=<?php echo $matter->row()->mach_time*60; ?>;
        var deadline = new Date(Date.parse(new Date()) + cTime * 1000);   //format 15 * 24 * 60 * 60 * 1000
        initializeClock('clockdiv', deadline);
        <?php } ?>
      });

      
      <?php 
      if($subpage==3){ ?>
        function konfirm(){
          alert('Sistem akan memeriksa pekerjaan Anda!');
        }
      <?php } ?>
        
      </script>
  <?php 
  }else if ($page=='see_all') {
  ?>
    <!-- DataTables -->
    <script src="<?php echo base_url('assets/adminlte'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/adminlte'); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
    $(function () {
      $('#fulldata').DataTable();

      //Waktu Pengerjaan
      $('.waktu').each(function(){
        var wInput=parseInt($(this).text());
        $(this).empty();
        jam=parseInt(wInput/60);
        menit=wInput%60;

        if(wInput>0){
          teks="";
          if(jam!=0){
            teks+=jam+" jam";
            if(menit!=0){
              teks+=" ";    
            }
          }
          if(menit!=0){
            teks+=menit+" menit";
          }
        }else{
          teks="";
        }
        $(this).text(teks);
      });

      $('.tablepress-id-1 tr').click(function(){
        var href=$(this).find('a').attr('href');
        if(href){
          window.location=href;
        }
      });

      $('.jml-soal').each(function(){
        var nsoal=$(this);
        var id_mtr=$(this).children('span').text();
        $(this).empty();

        var url="<?php echo base_url('n_question_IDMtr'); ?>"+"/"+id_mtr;
        $.getJSON(url,function(result){
          $(nsoal).append(result);
        });
      });
    });
    </script>
    <?php } ?>

  <!-- Page Script -->
	<script>
    $(function () {
      $('input').each(function(){
        var text=$(this).attr('placeholder');
        $(this).attr({"onfocus":"this.placeholder=''","onblur":'this.placeholder="'+text+'"'});
      });

      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
      });
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
      });
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
      });

      $('select').each(function(){
        if($(this).children('option:first-child').is(':selected')){
          $(this).css('color','#999');
        }else{
          $(this).css('color','#555');
        }
      });

      $('select').change(function(){
        if($(this).children('option:first-child').is(':selected')){
          $(this).css('color','#999');
        }else{
          $(this).css('color','#555');
        }
      });
    });
  </script>
<!-- End of b-scrip --> 
