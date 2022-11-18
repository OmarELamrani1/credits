  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
      
        
      </div>
      <?php if(!auth()->user() || \Request::is('static-sign-up')): ?>
        <div class="row">
          <div class="col-8 mx-auto text-center mt-1">
            <p class="mb-0 text-secondary">
              Copyright © <script>
                document.write(new Date().getFullYear())
            </script>, Developed by
            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">EL AMRANI Omar</a> &amp; <a style="color: #252f40;" href="https://www.updivision.com" class="font-weight-bold ml-1" target="_blank">EKOUINES Soufiane</a>
            
            </p>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<?php /**PATH /home/omar/Bureau/credits/resources/views/layouts/footers/guest/footer.blade.php ENDPATH**/ ?>