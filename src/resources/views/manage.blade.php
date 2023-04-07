
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/manage.css') }}" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
<div class="manage__title">
    <h2>管理システム</h2>
</div>

<div class="manage__search">
<form class="search-form" action="/search" method="get">
    @csrf

<div class="manage__search--column">
    <div class="manage__search--line1">
        <div class="name">
            <p class="name__weight">お名前</p>


            <input class="name__text" type="text" name="fullname"id="fullname" >



        </div>
        
        <div class="gender">

  <p class="name__gender">性別</p>
<div class="radio__all">
  <label for="radio-1">
    <input type="radio" name="gender" value=""
    id="radio-1" checked>
    <span class="mwform-radio-field-text">全て</span>
  </label>

  <label for="radio-2">
    <input type="radio" name="gender" value="男性" id="radio-2">
    <span>男性</span>
  </label>

  <label for="radio-3">
    <input type="radio" name="gender" value="女性" id="radio-3">
    <span>女性</span>
  </label>
</div>

        </div>
        </div>

    <div class="manage__search--line2">
        <p class="name__weight">登録日</p>
        <input class="date__text1" type="date" name="start_date" id="start_date" >
        <p>~</p>
        <input class="date__text2" type="date" name="end_date" id="end_date" >
    </div>

    <div class="manage__search--line3">
        <p class="name__weight">メールアドレス</p>
        <input class="email__text" type="text" name="email"  >
    </div>
    
    <div class="button1">
    <button class="form__button-submit1" type="submit">検索</button>
    </div>
    <div class="button2">
    <button class="form__button-submit2" type="reset">リセット</button>
    </div>
</div>

@if (count($contact) > 0)
<table>
  <div class="paginate">
  <div>
  全{{ $contact->total() }}件中  {{ $contact->firstItem() }}~{{ $contact->lastItem() }}件
</div>
 <div class="pagination">
    {{ $contact->onEachSide(2)->appends(request()->query())->links('default') }}
  </div>
  </div>
  <div class="table">
  <tr class="table__tr">
    <th>ID</th>
    <th>お名前</th>
    <th>性別</th>
    <th>メールアドレス</th>
    <th>ご意見</th>
    <th></th>

  </tr >
  @foreach ($contact as $contacts)
<tr class="table__tr">
  <td>{{ $contacts->id }}</td>
  <td>{{ $contacts->fullname }}</td>
  <td>{{ $contacts->gender }}</td>
  <td>{{ $contacts->email }}</td>
  <td class="content-preview">{{ $contacts->content }}</td>
  <td>
    <form id="delete-form-{{$contacts->id}}" class="delete-form" data-id="{{ $contacts->id }}" action="{{ route('contact.destroy', $contacts->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this content?') }}')">
      @csrf
      @method('DELETE')
      <button type="submit" class="delete-button">{{ __('削除') }}</button>
    </form>
  </td>
</tr>
@endforeach
</div>
</table>
@else
    <p>No results found.</p>
@endif

</form>


</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(function() {
  $('.delete-button').click(function(e) {
    e.preventDefault();
    var id = $(this).closest('tr').find('.delete-form').data('id');
    if (confirm('本当に削除してもよろしいですか？')) {
      $('#delete-form-' + id).submit();
    }
  });
});
</script>
</body>
</html>


