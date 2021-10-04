
  <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name"><img src="<?php echo URL?>vendors/images/thekolaya-white.png" alt=""></div>
        <i class="fas fa-bars" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <a href="<?php echo URL?>Supervisor">
          <i class="fas fa-th-large"></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      
      <li>
       <a href="<?php echo URL?>Supervisor/updateTeaMeasure">
        <i class="fas fa-weight"></i>
         <span class="links_name">Update Tea Measure</span>
       </a>
       <span class="tooltip">Update Tea Measure</span>
     </li>
     <li>
       <a href="<?php echo URL?>Supervisor/manageRequests">
        <i class="fab fa-acquisitions-incorporated"></i>
         <span class="links_name">Requests</span>
       </a>
       <span class="tooltip">Requests</span>
     </li>
     <li>
       <a href="<?php echo URL?>Supervisor/manageFertilizer">
        <i class="fas fa-tree"></i>
         <span class="links_name">Fertilizer</span>
       </a>
       <span class="tooltip">Fertilizer</span>
     </li>
     <li>
       <a href="<?php echo URL?>Supervisor/manageFirewood">
        <i class="fas fa-fire"></i>
         <span class="links_name">Firewood</span>
       </a>
       <span class="tooltip">Firewood</span>
     </li>
    </ul>

    <div class="social_media_icon">
      <div class="social_media">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
    
  </div>
  <section class="home-section">
  <div class="wrapper">
        <div class="navbar">
          <div class="navbar_left">
            <div class="thekolya-logo"><img src="<?php echo URL?>vendors/images/thekolaya.png" alt=""></div>
          </div>
      
          <div class="navbar_right">
            <div class="notifications">
              <div id="bell" class="icon_wrap"><i class="far fa-bell"></i></div>
              
              <div class="notification_dd">
                  <ul class="notification_ul">
                      <?php
                        for($i = 0; $i < 4; $i++) {
                          echo '<li class="starbucks success">
                                  <div class="notify_icon">
                                    <span class="icon"><i class="fas fa-bell"></i></span>  
                                  </div>
                                  <div class="notify_data">
                                      <div class="title">
                                          Lorem, ipsum dolor.  
                                      </div>
                                      <div class="sub_title">
                                        Lorem ipsum dolor sit amet consectetur.
                                    </div>
                                  </div>
                                  <div class="notify_status">
                                      <p>Success</p>  
                                  </div>
                                </li>';
                        }
                      ?> 
                      <li class="show_all">
                          <p class="link">Show All Activities</p>
                      </li> 
                  </ul>
              </div>
              
            </div>
            <div class="profile">
              <div class="icon_wrap" id="account-web">
                <img src="<?php echo URL?>vendors/images/supervisor/profile.jpg" alt="profile_pic">
                <span class="name">Kumud Perera</span>
                <i class="fas fa-chevron-down"></i>
              </div>
      
              <div class="profile_dd">
                <ul class="profile_ul">
                  <li class="profile_li">
                      <div class="icon_wrap" id="account">
                        <img src="<?php echo URL?>vendors/images/supervisor/profile.jpg" alt="profile_pic">
                        <span class="name">Kumud Perera</span>
                      </div>
                  </li>
                  <li><a class="profile" href="<?php echo URL?>Supervisor/profile"><span class="picon"><i class="fas fa-user-alt"></i></span>Profile</a></li>
                  <li><a class="settings" href="<?php echo URL?>Supervisor/editProfile"><span class="picon"><i class="fas fa-cog"></i></span>Settings</a></li>
                  <li><a class="logout" href="<?php echo URL?>login/logout"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        
        <div class="popup">
          <div class="shadow"></div>
          <div class="inner_popup">
              <div class="notification_dd">
                  <ul class="notification_ul">
                      <li class="title">
                          <p>All Notifications</p>
                          <p class="close"><i class="fas fa-times" aria-hidden="true"></i></p>
                      </li>
                      <?php
                        for($i = 0; $i < 6; $i++) {
                          echo '<li class="starbucks success">
                                  <div class="notify_icon">
                                    <span class="icon"><i class="fas fa-bell"></i></span>  
                                  </div>
                                  <div class="notify_data">
                                      <div class="title">
                                          Lorem, ipsum dolor.  
                                      </div>
                                      <div class="sub_title">
                                        Lorem ipsum dolor sit amet consectetur.
                                    </div>
                                  </div>
                                  <div class="notify_status">
                                      <p>Success</p>  
                                  </div>
                                </li>';
                        }
                      ?>
                  </ul>
              </div>
          </div>
        </div>
        
      </div>