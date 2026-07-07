<?php
$qqs      = $DB->getColumn("SELECT count(*) from ".DBQZ."_qq WHERE 1");
$qqjobs   = $DB->getColumn("SELECT count(*) from ".DBQZ."_qqjob WHERE 1");
$signjobs = $DB->getColumn("SELECT count(*) from ".DBQZ."_signjob WHERE 1");
$wzjobs   = $DB->getColumn("SELECT count(*) from ".DBQZ."_wzjob WHERE 1");
$zongs    = $qqjobs + $signjobs + $wzjobs;
$users    = $DB->getColumn("SELECT count(*) from ".DBQZ."_user WHERE 1");
$yxts     = ceil((time()-strtotime($conf['build']))/86400);
$currentYear = date('Y');
?>

<?php
session_start();
$timestamp = time();
$ll_nowtime = $timestamp;
if ($_SESSION){
  $ll_lasttime = $_SESSION['ll_lasttime'];
  $ll_times = $_SESSION['ll_times'] + 1;
  $_SESSION['ll_times'] = $ll_times;
} else {
  $ll_lasttime = $ll_nowtime;
  $ll_times = 1;
  $_SESSION['ll_times'] = $ll_times;
  $_SESSION['ll_lasttime'] = $ll_lasttime;
}
if(($ll_nowtime - $ll_lasttime) < 3){
  if ($ll_times>=5){
    header("location:http://127.0.0.1");
    exit;
  }
} else {
  $ll_times = 0;
  $_SESSION['ll_lasttime'] = $ll_nowtime;
  $_SESSION['ll_times'] = $ll_times;
}
?>

<!DOCTYPE html>
<html lang="zh-CN" data-theme="dark">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="<?=$conf['sitename']?> - 打造全网最稳定的空间动态点赞网">
<meta name="keywords" content="QQ空间动态点赞,离线点赞,空间签到,QQ挂机">
<title><?=$conf['sitename'].$conf['sitetitle']?></title>

<link rel="stylesheet" href="/lty/css/style.css">
<link rel="icon" href="/lty/images/favicon.png">
</head>
<body>

<!-- 主题切换按钮 -->
<button id="themeToggle" class="theme-toggle" aria-label="切换主题">🌙</button>

<!-- 导航 -->
<nav>
  <div class="nav-inner container">
    <a href="/" class="logo">
      <img src="/images/logo.png" alt="logo" height="32">
    </a>

    <div class="links" id="mainNav">
      <a href="#features">本站优点</a>
      <a href="#details">功能介绍</a>
      <a href="#pricing">会员价格</a>
      <a href="./index.php?mod=dlyz">代理查询</a>
      <a href="./index.php?mod=wall">秒赞墙</a>
    </div>

    <div class="nav-actions">
      <a href="/index.php?mod=reg" class="btn-outline-sm">注册</a>
      <a href="/index.php?mod=login" class="btn-outline-sm">登录</a>
    </div>

    <button class="burger" id="burger" aria-label="菜单">☰</button>
  </div>
</nav>

<main class="container">

  <!-- ===== Hero ===== -->
  <section class="hero" id="header">
    <div class="hero-text">
      <h1><?=$conf['sitename']?></h1>
      <p class="p-large">稳定点赞 / 免费使用 / 简单上手<br>致力于提供稳定高效的空间动态点赞服务</p>
      
   <div class="hero-actions">
        <a href="/index.php?mod=reg" class="btn-primary">注册</a>
        <a href="/index.php?mod=login" class="btn-primary">登录</a>
      </div>
    </div>

      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-value"><?=$yxts?></div>
          <div class="stat-label">运行天数</div>
        </div>
        <div class="stat-card">
          <div class="stat-value"><?=$users?></div>
          <div class="stat-label">用户数量</div>
        </div>
        <div class="stat-card">
          <div class="stat-value"><?=$qqs?></div>
          <div class="stat-label">QQ数量</div>
        </div>
        <div class="stat-card">
          <div class="stat-value"><?=$zongs?></div>
          <div class="stat-label">任务总数</div>
        </div>
        <div class="stat-card">
          <div class="stat-value"><?=$info['times']?></div>
          <div class="stat-label">累计运行</div>
        </div>
      </div>
      
  </section>

  <!-- ===== 客户Logo ===== -->
  <section class="section center">
    <div class="logo-bar">
      <img src="/lty/images/customer-logo-1.png" alt="客户">
      <img src="/lty/images/customer-logo-2.png" alt="客户">
      <img src="/lty/images/customer-logo-3.png" alt="客户">
      <img src="/lty/images/customer-logo-4.png" alt="客户">
      <img src="/lty/images/customer-logo-5.png" alt="客户">
      <img src="/lty/images/customer-logo-6.png" alt="客户">
    </div>
  </section>

  <!-- ===== 本站优点 ===== -->
  <section class="section" id="features">
    <h2 class="center"><?=$conf['sitename']?> 从 2015 年稳定运营至今</h2>
    <div class="cards-3col">
      <div class="card">
        <h4>稳定追求</h4>
        <p>以用户需求为导向，提供最完善的动态点赞服务，不断超越自我！</p>
      </div>
      <div class="card">
        <h4>安全加密</h4>
        <p>所有用户信息采用加密协议传输，隐私得到保障，用得放心。</p>
      </div>
      <div class="card">
        <h4>专业技术</h4>
        <p>3年老品牌值得信任，2019年全新升级，持续迭代维护。</p>
      </div>
      <div class="card">
        <h4>分布监控</h4>
        <p>分布式监控系统 / 24小时不间断 / 秒级切换 / 完美离线托管。</p>
      </div>
      <div class="card">
        <h4>离线托管</h4>
        <p>不管上班、上学、外出游玩，无需挂机，轻松离线点赞评论。</p>
      </div>
      <div class="card">
        <h4>稳定使用</h4>
        <p>QQ状态码过期提醒 / 1秒响应 / 实时反馈 / 稳定高效。</p>
      </div>
    </div>
  </section>

  <!-- ===== 功能展示 ===== -->
  <section class="section">
    <h2 class="center"><?=$conf['sitename']?> 部分功能展示</h2>
    <div class="cards-3col">
      <div class="card">
        <h4>好友动态点赞</h4>
        <p>[24H自动] 为QQ空间好友发表的动态进行点赞</p>
      </div>
      <div class="card">
        <h4>好友动态评论</h4>
        <p>[24H自动] 评论QQ空间好友发表的动态</p>
      </div>
      <div class="card">
        <h4>发表空间说说</h4>
        <p>[24H自动] 定时发表QQ空间说说</p>
      </div>
      <div class="card">
        <h4>转发空间说说</h4>
        <p>[24H自动] 转发他人QQ空间发表的说说</p>
      </div>
      <div class="card">
        <h4>删除空间说说</h4>
        <p>[24H自动] 删除QQ空间说说</p>
      </div>
      <div class="card">
        <h4>删除空间留言</h4>
        <p>[24H自动] 删除QQ空间全部留言</p>
      </div>
      <div class="card">
        <h4>互刷空间人气</h4>
        <p>[24H自动] 站内QQ互刷空间人气（日限20次）</p>
      </div>
      <div class="card">
        <h4>互刷空间留言</h4>
        <p>[24H自动] 站内QQ互刷空间留言</p>
      </div>
      <div class="card">
        <h4>互赞空间主页</h4>
        <p>[24H自动] 站内QQ互赞空间主页</p>
      </div>
    </div>
  </section>

  <!-- ===== 功能介绍 ===== -->
  <section class="section" id="details">
    <h2>功能介绍</h2>
    <hr>
    <div class="detail-block">
      <h4>空间类</h4>
      <p>离线空间动态点赞、空间动态秒评、发图片说说、说说转发、说说圈图、批量删除说说、批量删除留言、互刷主页赞、互刷留言等</p>
    </div>
    <div class="detail-block">
      <h4>签到类</h4>
      <p>空间签到、会员签到、钱包签到、QQ群签到、群问问签到、部落签到、花藤服务、书城签到、QQ浏览器赚积分、微云签到、绿钻黄钻蓝钻签到等</p>
    </div>
    <div class="detail-block">
      <h4>实用工具</h4>
      <p>单项检测、空间动态点赞检测、刷圈圈赞、说说刷赞、互刷人气、刷说说队形、空间音乐查询、批量添加好友、导出群成员</p>
    </div>
    <ul class="feature-list">
      <li>内置全套QQ等级加速，稳定永远在线，安全快捷</li>
      <li>服务器24h不间断运行，稳定、快速、实用</li>
    </ul>
    <div class="hero-actions">
      <a href="/index.php?mod=reg" class="btn-primary">注册</a>
      <a href="/index.php?mod=login" class="btn-primary">登录</a>
    </div>
  </section>

<!-- ===== 会员价格 ===== -->
<section class="section" id="pricing">
  <h2 class="center">VIP 会员</h2>
  <div class="cards-3col">

    <!-- 月付VIP -->
    <div class="card">
      <h3>月付VIP</h3>
      <div class="price">¥10 <span>/ 月</span></div>
      <ul>
        <li>享用VIP专属服务器</li>
        <li>享受离线超快频率</li>
        <li>开启全部VIP功能</li>
        <li>可使用单向好友检测</li>
        <li>享受VIP专属售后服务</li>
      </ul>
      <a href="/index.php?mod=reg" class="btn-primary">注册</a>
    </div>

    <!-- 年付VIP -->
    <div class="card">
      <h3>年付VIP</h3>
      <div class="price">¥100 <span>/ 年</span></div>
      <ul>
        <li>享用VIP专属服务器</li>
        <li>享受离线超快频率</li>
        <li>开启全部VIP功能</li>
        <li>可使用单向好友检测</li>
        <li>享受VIP专属售后服务</li>
      </ul>
      <a href="/index.php?mod=reg" class="btn-primary">注册</a>
    </div>

    <!-- 永久VIP -->
    <div class="card recommend">
      <h3>永久VIP</h3>
      <div class="price">¥188 <span>/ 永久</span></div>
      <ul>
        <li>享用VIP专属服务器</li>
        <li>享受离线超快频率</li>
        <li>开启全部VIP功能</li>
        <li>可使用单向好友检测</li>
        <li>享受VIP专属售后服务</li>
      </ul>
      <a href="/index.php?mod=reg" class="btn-primary">注册</a>
    </div>

  </div>
</section>

  <!-- ===== 用户评价 ===== -->
  <section class="section">
    <h2 class="center">用户评价</h2>
    <div class="cards-2col">
      <div class="card testimonial">
        <div class="t-header">
          <img src="https://q1.qlogo.cn/g?b=qq&nk=825703967&s=100" alt="用户">
          <div>
            <strong>龙毅</strong><br>
            <span class="sub">龍腾云任务站长</span>
          </div>
        </div>
        <p>我很看好龍腾云任务的发展和未来使用的人数，首页是自己做的模板，精心准备了一切为大家展开了稳定秒赞秒评的平台。</p>
      </div>
      <div class="card testimonial">
        <div class="t-header">
          <img src="https://q1.qlogo.cn/g?b=qq&nk=792303998&s=100" alt="用户">
          <div>
            <strong>星辰</strong><br>
            <span class="sub">龍腾云任务用户</span>
          </div>
        </div>
        <p>同学介绍来的，用了几天还没出过问题，刚开通了一个会员，顺便发个留言，网站速度够快的！</p>
      </div>
      <div class="card testimonial">
        <div class="t-header">
          <img src="https://q1.qlogo.cn/g?b=qq&nk=702133317&s=100" alt="用户">
          <div>
            <strong>尘封</strong><br>
            <span class="sub">龍腾云任务用户</span>
          </div>
        </div>
        <p>这个云任务网是我用的最好用的一个网站，功能齐全，并且不容易失效。</p>
      </div>
      <div class="card testimonial">
        <div class="t-header">
          <img src="https://q1.qlogo.cn/g?b=qq&nk=1580117469&s=100" alt="用户">
          <div>
            <strong>倾城</strong><br>
            <span class="sub">龍腾云任务用户</span>
          </div>
        </div>
        <p>空间动态点赞，一百个放心，别的网站几下子又要改密码了，而这里不同，我只改过一次密码。</p>
      </div>
    </div>
  </section>

  <!-- ===== 订阅 ===== -->
  <section class="section center">
    <h2>了解最新消息，获取更多功能</h2>
    <form class="subscribe-form">
      <input type="email" placeholder="输入您的邮箱" required>
      <button type="submit">订阅</button>
    </form>
  </section>

</main>

<!-- ===== 页脚 ===== -->
<footer>
  <div class="container">
    <div class="footer-grid">
      <div>
        <h4>关于站长</h4>
        <p>站长于2015年搭建过空间云任务，有建站经验，而且有多台服务器，无需担心网站运营问题。</p>
      </div>
      <div>
        <h4>注意事项</h4>
        <ul>
          <li>网站数据经过加密不会泄露</li>
          <li>若QQ被盗用请自行查找问题</li>
        </ul>
      </div>
      <div>
        <h4>联系方式</h4>
        <p>广东深圳</p>
        <p>admin@lt6.ltd</p>
        <p>ch.ltywl.top</p>
      </div>
    </div>
    <p class="copyright">Copyright © 2015 - <?=$currentYear?> <?=$conf['sitename']?></p>
  </div>
</footer>

<script src="/lty/js/script.js"></script>

<!-- ===== 版权信息，请勿随意修改，尊重原作者，非常感谢 ===== -->
<script>
  (() => {
    'use strict';

    const brand = '彩虹云任务首页模板 v1.0';
    const author = 'by 龍腾云任务 | https://ch.ltywl.top';

    console.log(
      `%c${brand}%c${author}`,
      // 绿色块
      'background-color:#00e5a0;color:#ffffff;font-size:16px;padding:6px 12px;border-radius:4px 0 0 4px;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;font-weight:600;',
      // 深灰块
      'background-color:#1d1d1f;color:#ffffff;font-size:16px;padding:6px 12px;border-radius:0 4px 4px 0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,sans-serif;'
    );
  })();
</script>
</body>
</html>
