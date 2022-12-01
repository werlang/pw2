import { carousel } from './carousel.js';
import { cart } from './cart.js';

carousel.init({
    parent: document.querySelector('#carousel-container'),
    createPlayer: true,
    time: 6000,
}).add([
    { img: 'https://randompicturegenerator.com/img/dog-generator/g7931bedc610c221584c344a1a67300465b99e0746f465e4e269b8e2918fee883cf1552886769f4b795aef18a62091264_640.jpg', text: 'Banho de rio' },
    { img: 'https://randompicturegenerator.com/img/dog-generator/g8d04ff9ccd52975d1b0f4badc6417832ee4c735b1ad51ee8ec28b2b6b53aed58211b9c7b81616af8c79c6a5d6fc333bc_640.jpg', text: 'A matilha' },
    { img: 'https://randompicturegenerator.com/img/dog-generator/gdf87dce1d199e81b42c22f90b3440b892ed88e91154989d16dab2f2fe5f826eed520548f221f2db4d25df81d1ff20195_640.jpg', text: 'Disputa feroz' },
    { img: 'https://randompicturegenerator.com/img/dog-generator/ge1d887b8844da8b668d202169c9363aec200df9093fa2f2667bfce0f821f75e52bb8f7df4baddb55757786c24f647c7c_640.jpg', text: 'Pastor alemão' },
    { img: 'https://randompicturegenerator.com/img/dog-generator/g90179baf7fc388d07c8bd88170e9ce079e27ecc5c9bca37bcd21621c6add88458ff23533759626c966a625f5c6939f0c_640.jpg', text: 'Lobo da floresta' },
    { img: 'https://randompicturegenerator.com/img/dog-generator/ge0d31300a1b1d4ea4244e2cb74958122df2e6568362a3ef892a5b0a56cf901c70d9cc3d8e3275c5341271bed577907fa_640.jpg', text: 'Cão preto' },
    { img: 'https://randompicturegenerator.com/img/dog-generator/g5278434099f6ddfee517dc2bab84c73837ad9d9fde1224f4b56c6c234b2358ffe252e716a72a7d2d76afa7ab497aacd8_640.jpg', text: 'Executive Dogman' },
    { img: 'https://randompicturegenerator.com/img/dog-generator/g3126e61c75999e90a549252915c20f712abc3a1b50686b2b58622b3ec78105aa8a65aae0aef8d956c3b744c1cd50c849_640.jpg', text: 'Filhote de Golden' },
    { img: 'https://randompicturegenerator.com/img/dog-generator/gd93c79a69f21fa012c7090b6c3cb79584cd1f2c8350bc1fb7186ef1790127e05dc9adae1f64ad08fc5e844daaf29cee0_640.jpg', text: 'Pug enrolado' },
    { img: 'https://randompicturegenerator.com/img/dog-generator/g913a2b6f81253654df3b9e66abc189e6b966daf7a7a37b814b2336ab4459a832db90c8b923a5a8e28e63bb2fdd4496e1_640.jpg', text: 'Linguicinha preto' },
]).start();