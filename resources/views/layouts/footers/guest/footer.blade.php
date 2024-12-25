<!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
<footer class="footer py-5">
  <div class="container">
    <div class="row">

      @if (!auth()->user())
        <div class="col-lg-8 mx-auto text-center mb-4 mt-2">

        </div>
      @endif
    </div>
    @if (!auth()->user() )
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
        <p class="mb-0 text-secondary">
          Copyright ©
          <script>
          document.write(new Date().getFullYear())
          </script> by
          <a style="color: #252f40;" class="font-weight-bold ml-1" target="_blank">PediPulse</a>
        </p>
        </div>
      </div>
    @endif
  </div>
</footer>
<!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->