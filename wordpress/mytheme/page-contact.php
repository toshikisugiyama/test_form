<?php get_header(); ?>
<?php
  if (isset($_POST['form-2-search-address']) || isset($_POST['form-3-search-address'])) {
    if ($_POST['zip-1'] !== '' && $_POST['zip-2'] !== '') {
      $address = getApiDataCurl($zipcodeApiUrl.$_POST['zip-1'].$_POST['zip-2']);
      $prefecture_json = array_to_json($address['results'][0]['address1']);
    }
  }
?>
  <main>
    <section class="container">
      <div class="tab-wrapper">
        <div id="tab-1" class="tab active">お問い合わせ</div>
        <div id="tab-2" class="tab">資料請求</div>
        <div id="tab-3" class="tab">法人・団体お問い合わせ</div>
      </div>
      <div class="form-wrapper">
        <!-- form-1 お問い合わせ -->
        <section id="form-1" class="form active">
          <h1 class="form__title">お問い合わせ</h1>
          <?php get_template_part('attentions'); ?>
          <form action="" mehtod="post">
            <div class="form__item">
              <label for="inquiry_subject_id" class="form__item__label required">項目選択</label>
              <div class="form__item__content">
                <select name="inquiry_subject_id[]" id="inquiry_subject_id" class="form__item__content__item" autofocus required>
                  <option value="">--ご選択ください--</option>
                  <option value="2">ご予約に関するお問い合わせ</option>
                  <option value="4">ウエディングによるお問い合わせ</option>
                  <option value="6">Webサイトの不具合などについてのお問い合わせ</option>
                  <option value="7">採用に関するお問い合わせ</option>
                  <option value="8">その他</option>
                </select>
              </div>
            </div>
            <div class="form__item">
              <label for="form-1-name" class="form__item__label required">名前（漢字）</label>
              <div class="form__item__content">
                <input type="text" name="name" id="form-1-name"  class="form__item__content__item" required>
              </div>
            </div>
            <div class="form__item">
              <label for="form-1-kana" class="form__item__label required">名前（カタカナ）</label>
              <div class="form__item__content">
                <input type="text" name="kana" id="form-1-kana"  class="form__item__content__item" required>
              </div>
            </div>
            <div class="form__item">
              <label for="form-1-dept" class="form__item__label">会社・部署名</label>
              <div class="form__item__content">
                <input type="text" name="dept" id="form-1-dept"  class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-1-tel" class="form__item__label required">電話番号</label>
              <div class="form__item__content">
                <input type="text" name="tel" id="form-1-tel"  class="form__item__content__item" required>
              </div>
            </div>
            <div class="form__item">
              <label for="form-1-email" class="form__item__label required">メールアドレス</label>
              <div class="form__item__content">
                <input type="text" name="email" id="form-1-email"  class="form__item__content__item" required>
              </div>
            </div>
            <div class="form__item">
              <label for="form-1-fax" class="form__item__label">FAX番号</label>
              <div class="form__item__content">
                <input type="text" name="fax" id="form-1-fax"  class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-1-content" class="form__item__label required">お問い合わせ内容</label>
              <div class="form__item__content">
                <textarea name="content" id="form-1-content"  class="form__item__content__item" cols="30" rows="10" required></textarea>
              </div>
            </div>
            <div class="form__item button">
              <button disabled>入力内容を確認する</button>
            </div>
          </form>
        </section>
        <!-- form-2 資料請求 -->
        <section id="form-2" class="form">
          <h1 class="form__title">資料請求</h1>
          <?php get_template_part('attentions'); ?>
          <form action="" method="post">
            <div class="form__item">
              <div class="form__item__label required">ご希望の資料</div>
              <div class="form__item__content">
                <ul class="form__item__content__item">
                  <li>
                    <label>
                      <input type="checkbox" name="inquiry_subject_id[]" value="9">
                      ホテル
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox" name="inquiry_subject_id[]" value="10">
                      ゴルフ
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox" name="inquiry_subject_id[]" value="11">
                      オプションメニュー
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="checkbox" name="inquiry_subject_id[]" value="12">
                      その他<span>その他の資料をご希望の方は、メモ欄に詳細をご記入ください</span>
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="form__item">
              <label for="form-2-name" class="form__item__label required">名前（漢字）</label>
              <div class="form__item__content">
                <input type="text" name="name" id="form-2-name" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-2-kana" class="form__item__label required">名前（カタカナ）</label>
              <div class="form__item__content">
                <input type="text" name="kana" id="form-2-kana" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-2-dept" class="form__item__label">会社・部署名</label>
              <div class="form__item__content">
                <input type="text" name="dept" id="form-2-dept" class="form__item__content__item">
                <p class="form__item__content__item">会社宛に郵送を希望される際は必ず入力ください。</p>
              </div>
            </div>
            <div class="form__item">
              <label for="form-2-zip-1" class="form__item__label required">郵便番号</label>
              <div class="form__item__content">
                <div class="form__item__content__item row zip">
                  <input type="text" name="zip-1" id="form-2-zip-1" value="<?php echo esc_attr($_POST['zip-1']); ?>">
                  <span>-</span>
                  <input type="text" name="zip-2" id="form-2-zip-2" value="<?php echo esc_attr($_POST['zip-2']); ?>">
                  <button type="submit" name="form-2-search-address">住所検索</button>
                </div>
                <p><?php echo esc_html($address['message']); ?></p>
              </div>
            </div>
            <div class="form__item">
              <label for="form-2-prefecture" class="form__item__label required">都道府県</label>
              <div class="form__item__content">
                <select type="text" name="prefecture" id="form-2-prefecture" class="form__item__content__item">
                  <option value="">--ご選択ください--</option>
                  <?php for ($i=0; $i < count($prefectures['response']['prefecture']); $i++): ?>
                  <option value="<?php echo esc_attr($i+1); ?>"><?php echo esc_html($prefectures['response']['prefecture'][$i]); ?></option>
                  <?php if($i === array_key_last($prefectures['response']['prefecture'])): ?>
                  <option value="<?php echo esc_attr($i+2); ?>">その他(海外等)</option>
                  <?php endif; endfor; ?>
                </select>
              </div>
            </div>
            <div class="form__item">
              <label for="form-2-city" class="form__item__label required">市区町村</label>
              <div class="form__item__content">
                <input type="text" name="city" id="form-2-city" class="form__item__content__item" value="<?php echo esc_attr($address['results'][0]['address2'].$address['results'][0]['address3']); ?>">
              </div>
            </div>
            <div class="form__item">
              <label for="form-2-address" class="form__item__label required">番地および建物名など</label>
              <div class="form__item__content">
                <input type="text" name="address" id="form-2-address" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-2-tel" class="form__item__label required">電話番号</label>
              <div class="form__item__content">
                <input type="text" name="tel" id="form-2-tel" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-2-email" class="form__item__label required">メールアドレス</label>
              <div class="form__item__content">
                <input type="text" name="email" id="form-2-email" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-2-fax" class="form__item__label">FAX番号</label>
              <div class="form__item__content">
                <input type="text" name="fax" id="form-2-fax" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-2-content" class="form__item__label required">メモ</label>
              <div class="form__item__content">
                <textarea name="content" id="form-2-content" class="form__item__content__item" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="form__item button">
              <button disabled>入力内容を確認する</button>
            </div>
          </form>
        </section>
        <!-- form-3 法人・団体お問い合わせ -->
        <section id="form-3" class="form">
          <h1 class="form__title">法人・団体お問い合わせ</h1>
          <?php get_template_part('attentions'); ?>
          <form action="" method="post">
            <div class="form__item">
              <label for="form-3-company_name" class="form__item__label required">法人・団体名</label>
              <div class="form__item__content">
                <input type="text" name="company_name" id="form-3-company_name" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-zip-1" class="form__item__label required">郵便番号</label>
              <div class="form__item__content">
                <div class="form__item__content__item row zip">
                  <input type="text" name="zip-1" id="form-3-zip-1" value="<?php echo esc_attr($_POST['zip-1']); ?>">
                  <span>-</span>
                  <input type="text" name="zip-2" id="form-3-zip-2" value="<?php echo esc_attr($_POST['zip-2']); ?>">
                  <button type="submit" name="form-3-search-address">住所検索</button>
                </div>
                <p><?php echo esc_html($address['message']); ?></p>
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-prefecture" class="form__item__label required">都道府県</label>
              <div class="form__item__content">
                <select type="text" name="prefecture" id="form-3-prefecture" class="form__item__content__item">
                  <option class="form-3_prefecture" value="">--ご選択ください--</option>
                  <?php for ($i=0; $i < count($prefectures['response']['prefecture']); $i++): ?>
                  <option value="<?php echo esc_attr($i+1); ?>" class="form-3_prefecture"><?php echo esc_html($prefectures['response']['prefecture'][$i]); ?></option>
                  <?php if($i === array_key_last($prefectures['response']['prefecture'])): ?>
                  <option value="<?php echo esc_attr($i+2); ?>" class="form-3_prefecture">その他(海外等)</option>
                  <?php endif; endfor; ?>
                </select>
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-city" class="form__item__label required">市区町村</label>
              <div class="form__item__content">
                <input type="text" name="city" id="form-3-city" class="form__item__content__item" value="<?php echo esc_attr($address['results'][0]['address2'].$address['results'][0]['address3']); ?>">
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-address" class="form__item__label required">番地および建物名など</label>
              <div class="form__item__content">
                <input type="text" name="address" id="form-3-address" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-name" class="form__item__label required">ご担当者様名（漢字）</label>
              <div class="form__item__content">
                <input type="text" name="name" id="form-3-name" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-kana" class="form__item__label required">ご担当者様名（カタカナ）</label>
              <div class="form__item__content">
                <input type="text" name="kana" id="form-3-kana" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-department_name" class="form__item__label">部署名</label>
              <div class="form__item__content">
                <input type="text" name="department_name" id="form-3-department_name" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-tel" class="form__item__label required">ご連絡用電話番号</label>
              <div class="form__item__content">
                <input type="text" name="tel" id="form-3-tel" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-email" class="form__item__label">ご連絡用メールアドレス</label>
              <div class="form__item__content">
                <input type="text" name="email" id="form-3-email" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-fax" class="form__item__label">FAX番号</label>
              <div class="form__item__content">
                <input type="text" name="fax" id="form-3-fax" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-members_count" class="form__item__label required">ご利用人数</label>
              <div class="form__item__content">
                <div class="form__item__content__item row">
                  <input type="text" name="members_count" id="form-3-members_count">
                  <span>名</span>
                </div>
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-stay_checkin_at" class="form__item__label required">ご宿泊のご希望日（チェックイン日）</label>
              <div class="form__item__content">
                <input type="text" name="stay_checkin_at" id="form-3-stay_checkin_at" class="form__item__content__item">
                <div class="form__item__content__item">
                  <p>＊日程が未定の場合は、ご検討されている時期（例：○年○月ごろ）をご入力ください。</p>
                  <input type="text" name="consideration_at" id="form-3-consideration_at">
                </div>
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-stay_count" class="form__item__label required">ご宿泊の泊数</label>
              <div class="form__item__content">
                <div class="form__item__content__item row">
                  <input type="text" name="stay_count" id="form-3-stay_count">
                  <span>泊</span>
                </div>
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-purpose" class="form__item__label required">利用目的</label>
              <div class="form__item__content">
                <input type="text" name="purpose" id="form-3-purpose" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <div class="form__item__label required">ご宴会場のご利用</div>
              <div class="form__item__content">
                <ul class="form__item__content__item radiobutton">
                  <li>
                    <label>
                      <input type="radio" name="is_use_banq" checked>
                      なし
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="radio" name="is_use_banq" value="1">
                      あり
                    </label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-use_banq_start_at" class="form__item__label">ご宴会のご希望日</label>
              <div class="form__item__content">
                <input type="text" name="use_banq_start_at" id="form-3-use_banq_start_at" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <div for="" class="form__item__label required">会議場のご利用</div>
              <div class="form__item__content">
                <ul class="form__item__content__item radiobutton">
                  <li>
                    <label>
                      <input type="radio" name="is_use_hall" checked>
                      なし
                    </label>
                  </li>
                  <li>
                    <label>
                      <input type="radio" name="is_use_hall" value="1">
                      あり
                    </label>
                  </li>
                </div>
              </ul>
              </div>
            <div class="form__item">
              <label for="form-3-use_hall_start_at" class="form__item__label required">会議のご希望日</label>
              <div class="form__item__content">
                <input type="text" name="use_hall_start_at" id="form-3-use_hall_start_at" class="form__item__content__item">
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-banq_cuisine" class="form__item__label required">ご宴会のご希望スタイル</label>
              <div class="form__item__content">
                <textarea name="banq_cuisine" id="form-3-banq_cuisine" class="form__item__content__item" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="form__item">
              <label for="form-3-demand" class="form__item__label required">その他ご要望など</label>
              <div class="form__item__content">
                <textarea name="demand" id="form-3-demand" class="form__item__content__item" cols="30" rows="10"></textarea>
              </div>
            </div>
            <div class="form__item button">
              <button disabled>入力内容を確認する</button>
            </div>
          </form>
        </section>
      </div>
    </section>
  </main>
  <script>
    const post = JSON.parse('<?php echo $post_json; ?>')
    const prefecture = JSON.parse('<?php echo $prefecture_json; ?>')
    const prefectures = JSON.parse('<?php echo $prefectures_json; ?>')
  </script>
<?php get_footer();

