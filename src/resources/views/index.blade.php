<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Form</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>




      <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
      </div>
<div class="center">
    
      
      <form class="form" action="/contacts/confirm" method="post" id="form">
        @csrf
<div class="between">
        
        <div class="form__group--name">

            <div class="form__label--item">お名前 <span class="font__red">※</span></div>

          
        
            <div class="name__block1">
            <input class="name__text--1" type="text" name="firstname" value="{{ old('firstname') }}" id="first_name"/>
            <span class="text__example--name">例）山田</span>
            </div>

            <div class="name__block2">
            <input class="name__text--2" type="text" name="lastname" value="{{ old('lastname') }}" id="last_name" />
            <span class="text__example--name">例）太郎</span>
            </div>
        </div>

            

            <div class="form__error-name">
              <!--バリデーション機能を実装したら記述します。-->
              @error('firstname')
              {{ $message }}
              @enderror

              @error('lastname')
              {{ $message }}
              @enderror
            
            </div>
        </div>


        <div class="form__group">

        <div class="form__group-title">
            <span class="form__label--gender">性別 <span class="font__red">※</span></span>
        </div>

        <div class="radio__all">

  <label for="radio-2">
    <input type="radio" name="gender" value="男性" id="radio-2" checked>
    <span>男性</span>
  </label>

  <label for="radio-3">
    <input type="radio" name="gender" value="女性" id="radio-3">
    <span>女性</span>
  </label>
</div>
        
        
        </div>


        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス <span class="font__red">※</span></span>
          </div>

          <div class="form__group-content">

            <div class="form__input--text">
              <input type="email" name="email" placeholder="" value="{{ old('email') }}" id="email"/>
            </div>
            
            <p class="text__example">例）test@example.com</p>  
            
         
            <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
              @error('email')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--post">郵便番号 <span class="font__red">※</span></span>
            
          </div>

          <div class="form__group-content">

            <div class="form__input--post">
                
              <img src="../css/img/post.jpeg" alt="郵便記号"/>

              
              
              <input class="post" type="text" name="post" id="post" value="{{ old('post') }}"  />
              

              
              
            </div>
<small id="postError" class="text-danger"></small>
            <p class="text__example--post">例）123-4567</p>  

            <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
              @error('post')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>


        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所 <span class="font__red">※</span></span>
          </div>

          <div class="form__group-content">

            <div class="form__input--text">
              <input type="text" name="address" id="address" value="{{ old('address') }}"/>
            </div>

            <p class="text__example">例）東京都渋谷区千駄ヶ谷1-2-3</p>

            <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
              @error('address')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>


        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
          </div>
          <div class="form__group-content">

            <div class="form__input--text">
              <input type="text"  name="build" placeholder="" value="{{ old('build') }}" nullable/>
            </div>

            <p class="text__example">例）千駄ヶ谷マンション101</p>
          </div>
        </div>



        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">ご意見 <span class="font__red">※</span></span>
          </div>
          <div class="form__group-content">
            <div class="form__input--textarea">
              <textarea name="content" value="{{ old('content') }}" maxlength="120" id="content" ></textarea>
            </div>
            <div class="form__error">
              <!--バリデーション機能を実装したら記述します。-->
              @error('content')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit" onclick="validateForm(event)" id="submit">確認</button>
        </div>
</div>
      </form>


<script>
    const postInput = document.getElementById('post');
    const postError = document.getElementById('postError');

    postInput.addEventListener('blur', () => {
        const value = postInput.value;
        const regex = /^\d{3}-?\d{4}$/;
        const isValid = regex.test(value);

        postInput.value = value.replace(/[０-９]/g, (s) => {
            return String.fromCharCode(s.charCodeAt(0) - 65248);
        });

        if (!isValid) {
            postInput.classList.add('is-invalid');
            postError.textContent = '郵便番号は半角数字8桁で入力してください。';
        } else {
            postInput.classList.remove('is-invalid');
            postError.textContent = '';
        }

        
    });
</script>

<script>
  const post = document.getElementById('post');
  const address = document.getElementById('address');

  post.addEventListener('keyup', (event) => {
    const postValue = event.target.value;
    const url = `https://api.zipaddress.net/?zipcode=${postValue}`;
    fetch(url)
      .then(response => response.json())
      .then(data => {
        if (data.code === 200) {
          address.value = data.data.fullAddress;
        } else {
          console.error(data.message);
        }
      })
      .catch(error => console.error(error));
  });

  
</script>


</div>

</html>