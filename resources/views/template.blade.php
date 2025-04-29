@include('partials.header')
    <style>
        .border {
          border: none!important;
        }

        .bg-white { 
          background-color: transparent!important;
        }
    </style>
    <main>
      <!-- ===== Blog Single Start ===== -->
      <section class="gj qp gr hj rp hr">
        <div class="bb ze ki xn 2xl:ud-px-0">
          <div class="tc sf yo zf kq">
            <div class="ro">
              <div class="rounded-md shadow-solid-13 bg-white dark:bg-blacksection border border-stroke dark:border-strokedark p-7.5 md:p-10">
               

                <h2 class="ek vj 2xl:ud-text-title-lg kk wm nb gb">@yield('title')</h2>
   
                <p class="ob">
                  @yield('content')
                </p>

                <ul class="tc wf bg sb">
                  <li>
                    <p class="sj kk wm tb">Wees sociaal:</p>
                  </li>
                  <li>
                    <a href="#" class="tc wf xf yd ad rg ml il ih wk">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_47_28)">
                      <path d="M11.6663 11.25H13.7497L14.583 7.91663H11.6663V6.24996C11.6663 5.39163 11.6663 4.58329 13.333 4.58329H14.583V1.78329C14.3113 1.74746 13.2855 1.66663 12.2022 1.66663C9.93967 1.66663 8.33301 3.04746 8.33301 5.58329V7.91663H5.83301V11.25H8.33301V18.3333H11.6663V11.25Z" fill="white"/>
                      </g>
                      <defs>
                      <clipPath id="clip0_47_28">
                      <rect width="20" height="20" fill="white"/>
                      </clipPath>
                      </defs>
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="tc wf xf yd ad rg ml il jh wk">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_47_47)">
                      <path d="M18.4683 4.71327C17.8321 4.99468 17.1574 5.1795 16.4666 5.26161C17.1947 4.82613 17.7397 4.14078 17.9999 3.33327C17.3166 3.73994 16.5674 4.02494 15.7866 4.17911C15.2621 3.61792 14.5669 3.24574 13.809 3.12043C13.0512 2.99511 12.2732 3.12368 11.596 3.48615C10.9187 3.84862 10.3802 4.42468 10.0642 5.12477C9.74812 5.82486 9.67221 6.60976 9.84825 7.35744C8.46251 7.28798 7.10686 6.92788 5.86933 6.30049C4.63179 5.67311 3.54003 4.79248 2.66492 3.71577C2.35516 4.24781 2.19238 4.85263 2.19326 5.46827C2.19326 6.67661 2.80826 7.74411 3.74326 8.36911C3.18993 8.35169 2.64878 8.20226 2.16492 7.93327V7.97661C2.16509 8.78136 2.44356 9.56129 2.95313 10.1842C3.46269 10.807 4.17199 11.2345 4.96075 11.3941C4.4471 11.5333 3.90851 11.5538 3.38576 11.4541C3.60814 12.1468 4.04159 12.7526 4.62541 13.1867C5.20924 13.6208 5.9142 13.8614 6.64159 13.8749C5.91866 14.4427 5.0909 14.8624 4.20566 15.1101C3.32041 15.3577 2.39503 15.4285 1.48242 15.3183C3.0755 16.3428 4.93 16.8867 6.82409 16.8849C13.2349 16.8849 16.7408 11.5741 16.7408 6.96827C16.7408 6.81827 16.7366 6.66661 16.7299 6.51827C17.4123 6.02508 18.0013 5.41412 18.4691 4.71411L18.4683 4.71327Z" fill="white"/>
                      </g>
                      <defs>
                      <clipPath id="clip0_47_47">
                      <rect width="20" height="20" fill="white"/>
                      </clipPath>
                      </defs>
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="tc wf xf yd ad rg ml il kh wk">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_47_50)">
                      <path d="M11.1417 1.74502C9.14781 1.47074 7.12195 1.92715 5.43827 3.02999C3.75459 4.13283 2.52679 5.80761 1.98158 7.74508C1.43637 9.68255 1.61059 11.7519 2.47205 13.5709C3.33351 15.3899 4.82404 16.8359 6.66841 17.6417C6.61854 17.0015 6.66432 16.3575 6.80425 15.7309C6.95841 15.0317 7.88425 11.1784 7.88425 11.1784C7.69989 10.7651 7.60775 10.3167 7.61425 9.86419C7.61425 8.62669 8.32841 7.70336 9.21675 7.70336C9.37634 7.70103 9.53455 7.7331 9.68064 7.79738C9.82673 7.86166 9.95727 7.95665 10.0634 8.07588C10.1695 8.19511 10.2487 8.33578 10.2955 8.48835C10.3424 8.64091 10.3559 8.80178 10.3351 8.96002C10.3351 9.71002 9.85342 10.845 9.60175 11.91C9.55201 12.1053 9.54886 12.3096 9.59254 12.5064C9.63621 12.7031 9.72551 12.8869 9.85321 13.0428C9.98092 13.1987 10.1435 13.3225 10.3278 13.4041C10.5121 13.4857 10.713 13.5228 10.9142 13.5125C12.4959 13.5125 13.5559 11.4867 13.5559 9.09502C13.5559 7.26169 12.3417 5.88836 10.1034 5.88836C9.56789 5.86755 9.03373 5.95579 8.53336 6.14773C8.03298 6.33968 7.57684 6.63131 7.19262 7.00493C6.8084 7.37855 6.50413 7.82636 6.29827 8.32117C6.09241 8.81598 5.98926 9.34746 5.99508 9.88336C5.97122 10.4778 6.163 11.0608 6.53508 11.525C6.60461 11.5769 6.65538 11.65 6.67973 11.7333C6.70408 11.8166 6.70069 11.9055 6.67008 11.9867C6.63175 12.14 6.53508 12.5059 6.49675 12.64C6.48877 12.6855 6.47023 12.7285 6.4426 12.7655C6.41497 12.8026 6.37904 12.8326 6.33769 12.8532C6.29634 12.8738 6.25073 12.8844 6.20454 12.8841C6.15835 12.8838 6.11286 12.8727 6.07175 12.8517C4.91841 12.39 4.37508 11.1209 4.37508 9.67169C4.37508 7.29919 6.36175 4.45919 10.3367 4.45919C13.5001 4.45919 15.6034 6.77336 15.6034 9.24836C15.6034 12.5059 13.7892 14.955 11.1084 14.955C10.7077 14.9678 10.3103 14.8794 9.95286 14.6979C9.59541 14.5164 9.2895 14.2477 9.06342 13.9167C9.06342 13.9167 8.58175 15.8467 8.48675 16.2117C8.29282 16.8423 8.00667 17.4407 7.63758 17.9875C8.40675 18.2209 9.20591 18.3375 10.0092 18.3342C11.1039 18.3351 12.188 18.12 13.1994 17.7013C14.2108 17.2827 15.1297 16.6686 15.9035 15.8943C16.6772 15.12 17.2907 14.2007 17.7086 13.1889C18.1266 12.1772 18.3409 11.093 18.3393 9.99836C18.3382 7.98586 17.6091 6.04169 16.2864 4.52484C14.9638 3.00799 13.137 2.02091 11.1434 1.74586L11.1417 1.74502Z" fill="white"/>
                      </g>
                      <defs>
                      <clipPath id="clip0_47_50">
                      <rect width="20" height="20" fill="white"/>
                      </clipPath>
                      </defs>
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="#" class="tc wf xf yd ad rg ml il lh wk">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_47_53)">
                      <path d="M5.78353 4.16665C5.78331 4.60867 5.6075 5.03251 5.29478 5.34491C4.98207 5.65732 4.55806 5.8327 4.11603 5.83248C3.674 5.83226 3.25017 5.65645 2.93776 5.34373C2.62536 5.03102 2.44997 4.60701 2.4502 4.16498C2.45042 3.72295 2.62622 3.29912 2.93894 2.98671C3.25166 2.67431 3.67567 2.49892 4.1177 2.49915C4.55972 2.49937 4.98356 2.67517 5.29596 2.98789C5.60837 3.30061 5.78375 3.72462 5.78353 4.16665ZM5.83353 7.06665H2.5002V17.5H5.83353V7.06665ZM11.1002 7.06665H7.78353V17.5H11.0669V12.025C11.0669 8.97498 15.0419 8.69165 15.0419 12.025V17.5H18.3335V10.8916C18.3335 5.74998 12.4502 5.94165 11.0669 8.46665L11.1002 7.06665Z" fill="white"/>
                      </g>
                      <defs>
                      <clipPath id="clip0_47_53">
                      <rect width="20" height="20" fill="white"/>
                      </clipPath>
                      </defs>
                      </svg>
                    </a>
                  </li>
                </ul>
                
              </div>
            </div>

            <div class="jn/2 so">
              <div class="fb">
                <form action="#">
                  <div class="i">
                    <input
                      type="text"
                      placeholder="Search Here..."
                      class="vd sm _g ch pm vk xm rg gm dm/40 dn/40 li mi"
                    />

                    <button class="h r q _h">
                      <svg
                        class="th ul ml il"
                        width="21"
                        height="21"
                        viewBox="0 0 21 21"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          d="M16.031 14.617L20.314 18.899L18.899 20.314L14.617 16.031C13.0237 17.3082 11.042 18.0029 9 18C4.032 18 0 13.968 0 9C0 4.032 4.032 0 9 0C13.968 0 18 4.032 18 9C18.0029 11.042 17.3082 13.0237 16.031 14.617ZM14.025 13.875C15.2941 12.5699 16.0029 10.8204 16 9C16 5.132 12.867 2 9 2C5.132 2 2 5.132 2 9C2 12.867 5.132 16 9 16C10.8204 16.0029 12.5699 15.2941 13.875 14.025L14.025 13.875Z"
                        />
                      </svg>
                    </button>
                  </div>
                </form>
              </div>

              <div class="fb">
                <h4 class="tj kk wm qb">Locaties</h4>

                <ul>
                  <li class="ql vb du-ease-in-out il xl">
                    <a href="#">Brussel</a>
                  </li>
                  <li class="ql vb du-ease-in-out il xl">
                    <a href="#">ST-Truiden</a>
                  </li>
                  
                </ul>
              </div>

              <div class="">
                <h4 class="tj kk wm qb">Nieuwtjes</h4>

                <div>
                  <div class="tc fg 2xl:ud-gap-6 qb">
                    <img src="images/blog-small-01.png" alt="Blog" />
                    <h5 class="wj kk wm xl bn ml il">
                      <a href="#">Free advertising for your online business</a>
                    </h5>
                  </div>
                  <div class="tc fg 2xl:ud-gap-6 qb">
                    <img src="images/blog-small-02.png" alt="Blog" />
                    <h5 class="wj kk wm xl bn ml il">
                      <a href="#">9 simple ways to improve your design skills</a>
                    </h5>
                  </div>
                  <div class="tc fg 2xl:ud-gap-6">
                    <img src="images/blog-small-03.png" alt="Blog" />
                    <h5 class="wj kk wm xl bn ml il">
                      <a href="#">Tips to quickly improve your coding speed.</a>
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- ===== Blog Single End ===== -->

      <!-- ===== CTA Start ===== -->
      <section class="i pg gh ji">
  <!-- Bg Shape -->
  <img class="h p q" src="images/shape-16.svg" alt="Bg Shape" />

  <div class="bb ye i z-10 ki xn dr">
    <div class="tc uf sn tn un gg">
      <div class="animate_left to/2">
        <h2 class="fk vj zp pr lk ac">
            Join with 5000+ Startups Growing with Base.
        </h2>
        <p class="lk">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis nibh lorem. Duis sed odio lorem. In a efficitur leo. Ut venenatis rhoncus.
        </p>
      </div>
      <div class="animate_right bf">
        <a href="#" class="vc ek kk hh rg ol il cm gi hi">
            Get Started Now
        </a>
      </div>
    </div>
  </div>
</section>

      <!-- ===== CTA End ===== -->
    </main>
  @include('partials.footer')