$(function () {
  $('#menu-title').click(function () {
    $('#menu-container').toggleClass('active');
    $(this).next('ul').slideToggle();
  });
});

$(function () {
  // 編集ボタンをクリックしたら
  $('.js-modal-open').on('click', function () {
    // モーダルを表示
    $('.js-modal').fadeIn();

    // 押されたボタンから投稿内容を取得
    var post = $(this).attr('post');
    var post_id = $(this).attr('post_id');

    // モーダルの中の各要素にセット
    $('.modal_post').val(post);
    $('.modal_id').val(post_id);

    return false;
  });

  // 閉じるボタンをクリック
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });
});

$(function () {
  // 削除ボタンをクリックした時
  $(document).on('click', '.delete-btn', function (e) {
    e.preventDefault();
    // 削除用モーダルを表示
    $('.js-modal-delete').fadeIn();

    // IDを取得してリンク先を書き換える
    var post_id = $(this).attr('post_id');
    var delete_url = '/post/' + post_id + '/delete';
    $('.js-modal-delete-execute').attr('href', delete_url);

    return false;
  });

  // モーダルを閉じる処理
  $(document).on('click', '.js-modal-delete-close', function () {
    $('.js-modal-delete').fadeOut();
    return false;
  });
});
