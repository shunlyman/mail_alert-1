<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mail Alert</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">Mail Alert</a>
  </nav>
</header>
<main>
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">予定を追加する</div>
          <div class="panel-body">
            @if($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
            <form action="{{ route('alert.create') }}" method="post">
              @csrf
              <div class="form-group">
                <label for="name">予定名</label>
                <input type="text" class="form-control" name="name" id="name" />
              </div>
              <div class="form-group">
                <label for="type">予定種別</label>
                <select class="form-control" name="type" id="type">
                  <option value="date">日付</option>
                  <option value="everyday">毎日</option>
                  <option value="day_of_week">曜日</option>
                </select>
              </div>
              <div class="form-group">
                <label for="date">予定日付</label>
                <input type="text" class="form-control" name="date" id="date" />
              </div>
              <div class="form-group">
                <label for="date">曜日</label>
                <div class="d-flex">
                  <label for="week_mon">月</label>
                  <input type="checkbox" class="form-control" name="week_mon" id="week_mon" value="1" />
                  <label for="week_tue">火</label>
                  <input type="checkbox" class="form-control" name="week_tue" id="week_tue" value="1" />
                  <label for="week_wed">水</label>
                  <input type="checkbox" class="form-control" name="week_wed" id="week_wed" value="1" />
                  <label for="week_thu">木</label>
                  <input type="checkbox" class="form-control" name="week_thu" id="week_thu" value="1" />
                  <label for="week_fri">金</label>
                  <input type="checkbox" class="form-control" name="week_fri" id="week_fri" value="1" />
                  <label for="week_sat">土</label>
                  <input type="checkbox" class="form-control" name="week_sat" id="week_sat" value="1" />
                  <label for="week_sun">日</label>
                  <input type="checkbox" class="form-control" name="week_sun" id="week_sun" value="1" />
                </div>
              </div>
              <div class="form-group">
                <label for="time">予定時刻</label>
                <input type="text" class="form-control" name="time" id="time" />
              </div>
              <div class="form-group">
                <label for="email_amount">メール数</label>
                <input type="number" class="form-control" name="email_amount" id="email_amount" />
              </div>
              <div class="form-group">
                <label for="first_alert_timing">１回目のメールを送るタイミング</label>
                <input type="text" class="form-control" name="first_alert_timing" id="first_alert_timing" />
              </div>
              <div class="form-group">
                <label for="second_alert_flag">２回目のメールを送るかどうか</label>
                <div class="d-flex">
                  <input type="checkbox" class="" name="second_alert_flag" id="second_alert_flag" value="1" />
                  <label for="second_alert_flag">送る</label>
                </div>
              </div>
              <div class="form-group">
                <label for="second_alert_timing">２回目のメールを送るタイミング</label>
                <input type="text" class="form-control" name="second_alert_timing" id="second_alert_timing" />
              </div>
              <div class="form-group">
                <label for="mute_date">鳴らさない日</label>
                <input type="text" class="form-control" name="mute_date" id="mute_date" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
</main>

<script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
<script>
  flatpickr(document.getElementById('date'), {
    locale: 'ja',
    dateFormat: "Y/m/d",
    minDate: new Date()
  });
  // flatpickr.localize(flatpickr.l10ns.ja);
  flatpickr(document.getElementById('time'), {
      noCalendar: true,
      enableTime: true,
      dateFormat: "H:i",
      time_24hr: false, // trueで24時間表示、falseでAM、PM表示
      defaultHour: 9, // 初期設定の時間（hour）
      defaultMinute: 0, // 初期設定の時間（min）
      minDate: "8:00", // 時間の下限
      maxDate: "17:30" // 時間の上限
  });
  flatpickr(document.getElementById('first_alert_timing'), {
      noCalendar: true,
      enableTime: true,
      dateFormat: "H:i",
      time_24hr: true, // trueで24時間表示、falseでAM、PM表示
      defaultHour: 3, // 初期設定の時間（hour）
      defaultMinute: 0, // 初期設定の時間（min）
      minDate: "0:00", // 時間の下限
      maxDate: "23:59" // 時間の上限
  });
  flatpickr(document.getElementById('second_alert_timing'), {
      noCalendar: true,
      enableTime: true,
      dateFormat: "H:i",
      time_24hr: true, // trueで24時間表示、falseでAM、PM表示
      defaultHour: 1, // 初期設定の時間（hour）
      defaultMinute: 30, // 初期設定の時間（min）
      minDate: "0:00", // 時間の下限
      maxDate: "23:59" // 時間の上限
  });
  flatpickr(document.getElementById('mute_date'), {
    locale: 'ja',
    dateFormat: "Y/m/d",
    minDate: new Date()
  });
</script>
</body>
</html>