<!-- Donate Modal -->
<div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cryptofonts is a one man project.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="mb-5">Creating all these beautiful icons takes time and money.<br>
        If you think that my work has any value to you, or you like my icons, a small donation would be really appreciated.
        This would motivate me to create more icons and keep the project going.</p>

        <ul class="nav nav-pills nav-justified" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="cf cf-eth"></i> Ethereum</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Gitcoin</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="cf cf-btc"></i> Bitcoin</a>
          </li> -->
        </ul>
        <div class="tab-content text-center" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <p class="mt-4">Even 1 DAI would make the difference</p>
            <img class="qrcode" src="img/eth-address.svg" width="150">
            <p><span class="badge badge-pill badge-light">0xFC72b32F2f7caFCa4d5d99c031f4B8F9579c18b6</span></p>
          </div>
          <div class="tab-pane fade text-center" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <p class="mt-4"><a href="https://gitcoin.co/grants/720/crypto-fonts">Donate on Gitcoin by sponsoring my grant</a></p>
            <img src="img/gitcoin-logo.svg" height="150">
          </div>
          <!-- <div class="tab-pane fade text-center" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <p class="mt-4">I know transactions cost are high, but if you feel generous here's my Bitcoin address</p>
          </div> -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Nah, thanks</button>
      </div>
    </div>
  </div>
</div>
