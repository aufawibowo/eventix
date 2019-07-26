<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      *,
      *::after {
      box-sizing: border-box;
      margin: 0;
      }

      body {
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      color: #454f54;
      background-color: #f4f5f6;
      background-image: linear-gradient(to bottom left, #abb5ba, #d5dadd);
      }

      .ticket {
      display: grid;
      grid-template-rows: auto 1fr auto;
      min-width: 30rem;
      }
      .ticket__header, .ticket__body, .ticket__footer {
      padding: 1.25rem;
      background-color: white;
      border: 1px solid #abb5ba;
      box-shadow: 0 2px 4px rgba(41, 54, 61, 0.25);
      }
      .ticket__header {
      font-size: 1.5rem;
      border-top: 0.25rem solid purple;
      border-bottom: none;
      box-shadow: none;
      }
      .ticket__wrapper {
      box-shadow: 0 2px 4px rgba(41, 54, 61, 0.25);
      border-radius: 0.375em 0.375em 0 0;
      overflow: hidden;
      }
      .ticket__divider {
      position: relative;
      height: 1rem;
      background-color: white;
      margin-left: 0.5rem;
      margin-right: 0.5rem;
      }
      .ticket__divider::after {
      content: "";
      position: absolute;
      height: 50%;
      width: 100%;
      top: 0;
      border-bottom: 2px dashed #e9ebed;
      }
      .ticket__notch {
      position: absolute;
      left: -0.5rem;
      width: 1rem;
      height: 1rem;
      overflow: hidden;
      }
      .ticket__notch::after {
      content: "";
      position: relative;
      display: block;
      width: 2rem;
      height: 2rem;
      right: 100%;
      top: -50%;
      border: 0.5rem solid white;
      border-radius: 50%;
      box-shadow: inset 0 2px 4px rgba(41, 54, 61, 0.25);
      }
      .ticket__notch--right {
      left: auto;
      right: -0.5rem;
      }
      .ticket__notch--right::after {
      right: 0;
      }
      .ticket__body {
      border-bottom: none;
      border-top: none;
      }
      .ticket__body > * + * {
      margin-top: 1.5rem;
      padding-top: 1.5rem;
      border-top: 1px solid #e9ebed;
      }
      .ticket__section > * + * {
      margin-top: 0.25rem;
      }
      .ticket__section > h3 {
      font-size: 1.125rem;
      margin-bottom: 0.5rem;
      }
      .ticket__header, .ticket__footer {
      font-weight: bold;
      font-size: 1.25rem;
      display: flex;
      justify-content: space-between;
      }
      .ticket__footer {
      border-top: 2px dashed #e9ebed;
      border-radius: 0 0 0.325rem 0.325rem;
      }

    </style>
  </head>
  <body>

    <article class="ticket">
      <header class="ticket__wrapper">
        <div class="ticket__header">
          <img src="{{asset('images/logo-eventix.png')}}" alt="" height="150px">
          <p>
            ID: {{$id}}
          </p>
        </div>
        <div class="ticket__header">
          <small>
            {{date_format(date_create($orders[0]->created_at), 'd/m/Y - H:i')}}
          </small>
        </div>
      </header>
      <div class="ticket__divider">
        <div class="ticket__notch"></div>
        <div class="ticket__notch ticket__notch--right"></div>
      </div>
      <div class="ticket__body">
        <section class="ticket__section">
          <h3>To</h3>
          <p>{{Auth::user()->name}}</p>
        </section>
        <section class="ticket__section">
          <h3>Film name / Cinema</h3>
          <p>{{$orders[0]->film->name}} / {{$orders[0]->cinema->name}}</p>
        </section>
        <section class="ticket__section">
          <h3>Quantity</h3>
          <p>{{$orders->count()}}</p>
        </section>
      </div>
      <footer class="ticket__footer">
        <section class="ticket__section">
          <span>Total Paid </span> <br>
          <span> Rp{{number_format($orders->count() * $orders[0]->total,2,',','.')}}</span>
        </section>
        <img id="barcode" src="{{asset('images/barcode.png')}}" alt="" height="120px" width="200px">

      </footer>
    </article>

  </body>
</html>
