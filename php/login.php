<?php
require_once "vendor/autoload.php";
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>E2E Testing in Microservices </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link
  rel="stylesheet"
  href="https://sdks.shopifycdn.com/polaris/3.13.0/polaris.min.css"
/>    </head>
    <body>
    
    <form id="form" onsubmit="return false">
      

    <div style="--top-bar-background:#00848e; --top-bar-color:#f9fafb; --top-bar-background-lighter:#1d9ba4;">
  <div class="Polaris-Page Polaris-Page--singleColumn">
    <div class="Polaris-Page-Header">
      <div class="Polaris-Page-Header__TitleAndRollup">
        <div class="Polaris-Page-Header__Title">
          <div>
            <h1 class="Polaris-DisplayText Polaris-DisplayText--sizeLarge">Login to your account</h1>
          </div>
          <div></div>
        </div>
      </div>
    </div>
    
    <div class="Polaris-Page__Content">

<!-- Error banner -->
<div style="--top-bar-background:#00848e; --top-bar-color:#f9fafb; --top-bar-background-lighter:#1d9ba4;display: none" id="error">
  <div class="Polaris-Banner Polaris-Banner--statusCritical Polaris-Banner--withinPage" tabindex="0" role="alert" aria-live="polite" aria-labelledby="Banner100Heading" aria-describedby="Banner100Content">
    <div class="Polaris-Banner__Ribbon"><span class="Polaris-Icon Polaris-Icon--colorRedDark Polaris-Icon--isColored Polaris-Icon--hasBackdrop"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
          <circle fill="currentColor" cx="10" cy="10" r="9"></circle>
          <path d="M2 10c0-1.846.635-3.543 1.688-4.897l11.209 11.209A7.954 7.954 0 0 1 10 18c-4.411 0-8-3.589-8-8m14.312 4.897L5.103 3.688A7.954 7.954 0 0 1 10 2c4.411 0 8 3.589 8 8a7.952 7.952 0 0 1-1.688 4.897M0 10c0 5.514 4.486 10 10 10s10-4.486 10-10S15.514 0 10 0 0 4.486 0 10"></path>
        </svg></span></div>
    <div>
      <div class="Polaris-Banner__Heading" id="Banner100Heading">
        <p class="Polaris-Heading">An error occurred</p>
      </div>
      <div class="Polaris-Banner__Content" id="Banner100Content">
        <div id="errorMessage" > </div>
      </div>
    </div>
  </div>
</div>


<!-- Success -->
<div style="--top-bar-background:#00848e; --top-bar-color:#f9fafb; --top-bar-background-lighter:#1d9ba4;display: none" id="success">
  <div class="Polaris-Banner Polaris-Banner--statusSuccess Polaris-Banner--withinPage" tabindex="0" role="status" aria-live="polite" aria-labelledby="Banner123Heading">
    <div class="Polaris-Banner__Ribbon"><span class="Polaris-Icon Polaris-Icon--colorGreenDark Polaris-Icon--isColored Polaris-Icon--hasBackdrop"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg" focusable="false" aria-hidden="true">
          <circle fill="currentColor" cx="10" cy="10" r="9"></circle>
          <path d="M10 0C4.486 0 0 4.486 0 10s4.486 10 10 10 10-4.486 10-10S15.514 0 10 0m0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8m2.293-10.707L9 10.586 7.707 9.293a1 1 0 1 0-1.414 1.414l2 2a.997.997 0 0 0 1.414 0l4-4a1 1 0 1 0-1.414-1.414"></path>
        </svg></span></div>
    <div>
      <div class="Polaris-Banner__Heading" id="Banner123Heading">
        <p class="Polaris-Heading">Login successful</p>
      </div>
    </div>
  </div>
</div>





      <div class="Polaris-Card">
        <div class="Polaris-Card__Section">
          <div class="Polaris-FormLayout">
            <div class="Polaris-FormLayout__Item">
              <div class="">
                <div class="Polaris-Labelled__LabelWrapper">
                  <div class="Polaris-Label"><label id="TextField39Label" for="TextField39" class="Polaris-Label__Text">Account email</label></div>
                </div>
                <div class="Polaris-TextField"><input id="TextField39" placeholder="Email" class="Polaris-TextField__Input" name="email" type="email" aria-label="Account email" required aria-labelledby="TextField39Label" aria-invalid="false">
                  <div class="Polaris-TextField__Backdrop"></div>
                </div>
              </div>
            </div>
            <div class="Polaris-FormLayout__Item">
              <div class="">
                <div class="Polaris-Labelled__LabelWrapper">
                  <div class="Polaris-Label"><label id="TextField40Label" for="TextField40" class="Polaris-Label__Text">Password</label></div>
                </div>
                <div class="Polaris-TextField"><input id="TextField40" placeholder="Password" class="Polaris-TextField__Input" type="password" aria-label="Password" name="password" required aria-labelledby="TextField40Label" aria-invalid="false">
                  <div class="Polaris-TextField__Backdrop"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="Polaris-Card__Footer">
          <div class="Polaris-ButtonGroup">
            <div class="Polaris-ButtonGroup__Item"><button id="submit" type="submit" class="Polaris-Button Polaris-Button--primary"><span class="Polaris-Button__Content"><span class="Polaris-Button__Text">login</span></span></button></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

    </form>





<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    <script src="https://cdn.shopify.com/s/assets/external/app.js"></script>
    <script>
      window.url = "<?php echo getenv("SERVER_URL") ?>"
    </script>
      <script src="/public/login.js"></script>
    </body>
</html>