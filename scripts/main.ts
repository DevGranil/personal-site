
var loading;
document.onreadystatechange = function(){
    let spin1 = $(".loader__spinner1");
    let spin2 = $(".loader__spinner2");
    let spin3 = $(".loader__spinner3");
    let spinWrapper = $(".loader");

    function loaderAnim(){
        spin1.toggleClass("spinner"); 
        setTimeout(function(){
            spin2.toggleClass("spinner");
        }, 100) 
        
        setTimeout(function(){
            spin3.toggleClass("spinner");
        }, 200)
    }

    if(document.readyState == "interactive"){
        loading = setInterval(loaderAnim, 400)
     
               
    }
    if(document.readyState == "complete"){
        setTimeout(function(){        
            clearInterval(loading);
            spinWrapper.css('display', 'none');
        }, 1000)

         

}

}

$(document).ready(function(){

    class MainDoc {
       private hamburgerVisible : boolean = true;
       private navWrapper : JQuery = $(".mob-nav__wrapper");
       private viewPortBreak: number = 1024;
       private skillsWrapper = $(".a-skill__wrapper");
       private progressDone : boolean = false;

       constructor(private $document, private viewPort : number){
           this.$document = $document; 
           this.viewPort = viewPort;
           this.init();
          
       }

        init(){
           let self = this;
           self.attachEvents();
       }

       attachEvents(): void {
           let self = this;
           var vp = window.outerHeight;
           var skillSection = $('.skills__section');

           this.$document.on('click', '.hamburger__wrapper, body', function(e){
               if($(e.currentTarget).hasClass("hamburger__wrapper")){ 

                    self.mobileNav(e);
                } 
                else if($(e.target).hasClass("mob-nav__link--close")){
                    self.mobileNav(e);
                }
                else if(e.target.tagName === "UL"){
                    return;
                }
                else {
                    if ($(e.currentTarget).hasClass("body__container")){
                        if(self.viewPort > self.viewPortBreak || self.hamburgerVisible) return;
                        self.mobileNav(e);

                    }               
                 
               }

             

               
           });


          this.$document.on("scroll", function(){
            if(skillSection.length == 0) return;

            if(((skillSection.position().top - window.pageYOffset) + 300) < vp && !self.progressDone ){
                self.progressAnimation();
                
            }     
          })
       }

       progressAnimation(){
           let self = this;
           var i, l;

           let progressOb : {
            progressBar,
            numberEl,
            count,
            targetVal,

             } = null;
             for(i = 0 , l = self.skillsWrapper.length; i < l ; i++){
                var target = $(self.skillsWrapper[i]);
                var input = target.find(".js-skill__value");
                var value = input.val();
              
                if(typeof value === "string" ){
                    value = parseInt(value);
                }

                progressOb = {
                    progressBar: target.find(".js-progress-bar"),
                    numberEl: target.find(".a-skill__percentage-number"),
                    count : 0,
                    targetVal: value
                }

                self.animatingProgress(progressOb)
             }
            
             self.progressDone = true

       }

       animatingProgress(progressOb){
         var animate = setInterval(function(){
            progressOb.progressBar.val(progressOb.count)
            progressOb.count +=1;
            progressOb.numberEl.text(progressOb.count)
            if(progressOb.count == progressOb.targetVal){
                clearInterval(animate)
                
            }

           }, 20)
       }

  

        mobileNav($el : JQueryEventObject) :void {
           $el.stopImmediatePropagation();
           let self = this;
           let target = $($el.currentTarget);
           let hamLine1, hamLine2 ,hamLine3;
           

           hamLine1 = $(target.find(".js-hamLine1"));
           hamLine2 = $(target.find(".js-hamLine2"));
           hamLine3 = $(target.find(".js-hamLine3"));
           
           if(self.hamburgerVisible){
               hamLine2.attr("hidden", "true");
               hamLine1.addClass("ham-rotate__clock");
               hamLine3.addClass("ham-rotate__anti");
               self.navWrapper.css("display", "block");
               self.hamburgerVisible = false;      
               return
           }

           if(!self.hamburgerVisible){
               hamLine2.removeAttr("hidden");
               hamLine1.removeClass("ham-rotate__clock");
               hamLine3.removeClass("ham-rotate__anti");
               // self.navWrapper.css("display", "none");
               self.navWrapper.slideUp(300);
               self.hamburgerVisible = true;
               return
           }
       }

   }

const ob = new MainDoc($(document), window.outerWidth);
ob.init();
   
})



        


