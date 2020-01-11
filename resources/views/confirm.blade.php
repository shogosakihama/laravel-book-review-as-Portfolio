@extends('layout')

@section('content')

  <div class="row">
      <h1>お問合せの内容の確認</h1>
  </div>
  <div class="row">
      <p>下記、お問い合せ内容にて送信します。よろしければ「送信」ボタンを押してください。</p>

      <table class="table table-borderd">
      <tr>
      <td class="table-secondary" style="width:20%">メールアドレス</td>
      <td>{{ $email }}</td>
      </tr>
      <tr>
      <td class="table-secondary">件名</td>
      <td>{{ $subject }}</td>
      </tr>
      <td class="table-secondary">メッセージ</td>
      <td>{!! nl2br(e($message)) !!}</td>
      </tr>
      </table>
      <form action="sent" method="post">
          <input type="hidden" name="email" class="form-control" id="InputEmail" value="{{ $email }}">
          <input type="hidden" name="subject" class="form-control" id="InputSubject" value="{{ $subject }}">
          <input type="hidden" name="message" class="form-control" id="InputMessage" value="{{ $message }}">
          @csrf
          <button type="submit" name="action" class="btn btn-primary" value="back">戻る</button>
          <button type="submit" name="action" class="btn btn-primary" value="sent">送信</button>
      </form>
</div>
@endsection