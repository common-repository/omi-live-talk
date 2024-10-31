<?php
/**
 * Plugin Name: OMI Live Talk
 * Plugin URI: https://omicall.vn
 * Description: Plugin supports setting up chat, audio call and video call system for the website. Supporting the enterprises taking care of the customers in the best way.
 * Version: 1.0
 * Author: ViHAT Marketing Team
 * Author URI: https://vihat.vn
 * License: GPLv2
 */
?>
<?php
add_action('admin_head', 'omi_live_talk_stylesheet');

function omi_live_talk_stylesheet() {
  echo '<style>
    li.tag_note_omi {list-style: disc;margin-left: 20px;}
    .vihat_ad {border: #fff 1px solid;border-radius: 5px;padding: 15px 30px;
}
  </style>';
}
add_action ('admin_init', 'omi_live_talk_settings');
function omi_live_talk_settings () {
	register_setting ('omi-live-talk-settings-domain', 'omi_domain_name');
}
add_action ('admin_menu', 'omi_live_talk_menu');
function omi_live_talk_menu () {
	add_menu_page ('Live Talk Setting', 'Cấu hình OMI Live Talk', 'administrator', 'omi-live-talk-settings', 'omi_live_talk_settings_page', 'dashicons-format-chat');
}

function omi_live_talk_settings_page () {
	?>
<div class="wrap">
<h2>Cấu hình tên miền định danh của bạn trên hệ thống OMI Live Talk</h2>
<form method="post" action="options.php">
    <?php settings_fields( 'omi-live-talk-settings-domain' ); ?>
    <?php do_settings_sections( 'omi-live-talk-settings-domain' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Input Domain</th>
        <td><input type="text" name="omi_domain_name" value="<?php echo esc_attr( get_option('omi_domain_name') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(__('Lưu thay đổi', 'button primary')); ?>

</form>
<h2 class="title_dash_omi">Hướng dẫn lấy tên miền định danh miễn phí từ OMI Live Talk</h2>
  <p>Để tích hợp <strong>Omi Live Talk</strong> vào trang web của mình, bạn vui lòng đăng nhập OMI Live Talk bằng tài khoản chủ doanh nghiệp, nếu chưa có tài khoản, hãy đăng ký miễn phí tại: <a href="https://sso.omicall.com/register" target="_blank"><strong>https://sso.omicall.com/register</strong></a></p>
  <p>Đi đến tab <strong>Tích hợp / Live Talk</strong>. Nhấn vào icon Cấu hình và chọn tab <strong>Giao diện & Tích hợp</strong></p>
  <p>Tại đây, vui lòng đảm bảo bạn đã hoàn tất việc cấu hình Omi Live Talk:</p>
  
  <ul>
  <li class="tag_note_omi">Yêu cầu dữ liệu (cấu hình dữ liệu khách hàng bắt buộc nhập để sử dụng)
  <li class="tag_note_omi">Tính năng (bật tắt hiển thị tính năng ở Live Talk)
  <li class="tag_note_omi">Tiêu đề khung thông tin
  <li class="tag_note_omi">Mô tả khung thông tin
  <li class="tag_note_omi">Bố cục - vị trí nút
  <li class="tag_note_omi">Tùy chọn hiển thị
  <li class="tag_note_omi">Nút bắt đầu (cấu hình giao diện của các nút Live Talk)
  <li class="tag_note_omi">Bộ phận tiếp nhận (Bật tắt tự động chọn bộ phận tiếp nhận)
  <li class="tag_note_omi">Ngôn ngữ
  <li class="tag_note_omi">Thời gian chờ hiển thị popup thông tin
  <li class="tag_note_omi">Danh sách tên miền cho phép (giới hạn hiển thị ở tên miền cụ thể, nếu không giới hạn, vui lòng không nhập giá trị)
  <li class="tag_note_omi">Liên kết (Liên kết với những mạng xã hội khác như Skype, Facebook...)
</ul>
<p>Tên miền định danh của bạn sẽ có dạng: <u><b>domain</b></u>.omicrm.com/...</p>
<p>Copy <b>domain</b> của bạn và điền vào vị trí phía trên và <strong>Lưu thay đổi</strong></p>
<p class="thankyou-content">Đội ngũ ViHAT Marketing chân thành cảm ơn bạn đã tin dùng dịch vụ. Mọi sự đóng góp về tất cả dịch vụ của ViHAT hoặc cần sự hỗ trợ xin gửi thư về địa chỉ: <a href="mailto:tinhpt@esms.vn" target="_blank">tinhpt@esms.vn</a> hoặc Skype: <a href="skype:live:268e9921dc67e289">Tính Phạm</a></p>
<div class="vihat_ad">
<h2>Tham khảo thêm về các hệ thống dịch vụ dành cho doanh nghiệp của ViHAT</h2>
<ul>
  <li class="tag_note_omi">Hệ thống SMS Marketing - <a href="https://esms.vn" target="_blank">eSMS.vn</a>
  <li class="tag_note_omi">Hệ thống Tổng đài Cloud thông minh - <a href="https://omicall.vn" target="_blank">OMICall</a>
  <li class="tag_note_omi">Hệ thống Viber Marketing - <a href="https://vibermarketing.vn" target="_blank">Viber Marketing</a>
  <li class="tag_note_omi">Hệ thống tạo ứng dụng di động - <a href="https://teraapp.net" target="_blank">TeraApp</a>
  </ul>
  </div>
</div>
<?php
}
add_action( 'wp_footer', 'omi_live_talk_scripts' );
function omi_live_talk_scripts(){
  ?>
  <script id="omiWidgetScript" type="text/javascript" src="//minio.infra.omicrm.com/widget/click2call.js#domain=<?php echo get_option( 'omi_domain_name' ); ?>;"></script>
  <?php
}
?>