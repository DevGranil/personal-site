var loading;
document.onreadystatechange = function () {
    var spin1 = $(".loader__spinner1");
    var spin2 = $(".loader__spinner2");
    var spin3 = $(".loader__spinner3");
    var spinWrapper = $(".loader");
    function loaderAnim() {
        spin1.toggleClass("spinner");
        setTimeout(function () {
            spin2.toggleClass("spinner");
        }, 100);
        setTimeout(function () {
            spin3.toggleClass("spinner");
        }, 200);
    }
    if (document.readyState == "interactive") {
        loading = setInterval(loaderAnim, 400);
    }
    if (document.readyState == "complete") {
        setTimeout(function () {
            clearInterval(loading);
            spinWrapper.css('display', 'none');
        }, 1000);
    }
};
$(document).ready(function () {
    var MainDoc = /** @class */ (function () {
        function MainDoc($document, viewPort) {
            this.$document = $document;
            this.viewPort = viewPort;
            this.hamburgerVisible = true;
            this.navWrapper = $(".mob-nav__wrapper");
            this.viewPortBreak = 1024;
            this.skillsWrapper = $(".a-skill__wrapper");
            this.progressDone = false;
            this.$document = $document;
            this.viewPort = viewPort;
            this.init();
        }
        MainDoc.prototype.init = function () {
            var self = this;
            self.attachEvents();
        };
        MainDoc.prototype.attachEvents = function () {
            var self = this;
            var vp = window.outerHeight;
            var skillSection = $('.skills__section');
            this.$document.on('click', '.hamburger__wrapper, body', function (e) {
                if ($(e.currentTarget).hasClass("hamburger__wrapper")) {
                    self.mobileNav(e);
                }
                else if ($(e.target).hasClass("mob-nav__link--close")) {
                    self.mobileNav(e);
                }
                else if (e.target.tagName === "UL") {
                    return;
                }
                else {
                    if ($(e.currentTarget).hasClass("body__container")) {
                        if (self.viewPort > self.viewPortBreak || self.hamburgerVisible)
                            return;
                        self.mobileNav(e);
                    }
                }
            });
            this.$document.on("scroll", function () {
                if (skillSection.length == 0)
                    return;
                if (((skillSection.position().top - window.pageYOffset) + 300) < vp && !self.progressDone) {
                    self.progressAnimation();
                }
            });
        };
        MainDoc.prototype.progressAnimation = function () {
            var self = this;
            var i, l;
            var progressOb = null;
            for (i = 0, l = self.skillsWrapper.length; i < l; i++) {
                var target = $(self.skillsWrapper[i]);
                var input = target.find(".js-skill__value");
                var value = input.val();
                if (typeof value === "string") {
                    value = parseInt(value);
                }
                progressOb = {
                    progressBar: target.find(".js-progress-bar"),
                    numberEl: target.find(".a-skill__percentage-number"),
                    count: 0,
                    targetVal: value
                };
                self.animatingProgress(progressOb);
            }
            self.progressDone = true;
        };
        MainDoc.prototype.animatingProgress = function (progressOb) {
            var animate = setInterval(function () {
                progressOb.progressBar.val(progressOb.count);
                progressOb.count += 1;
                progressOb.numberEl.text(progressOb.count);
                if (progressOb.count == progressOb.targetVal) {
                    clearInterval(animate);
                }
            }, 20);
        };
        MainDoc.prototype.mobileNav = function ($el) {
            $el.stopImmediatePropagation();
            var self = this;
            var target = $($el.currentTarget);
            var hamLine1, hamLine2, hamLine3;
            hamLine1 = $(target.find(".js-hamLine1"));
            hamLine2 = $(target.find(".js-hamLine2"));
            hamLine3 = $(target.find(".js-hamLine3"));
            if (self.hamburgerVisible) {
                hamLine2.attr("hidden", "true");
                hamLine1.addClass("ham-rotate__clock");
                hamLine3.addClass("ham-rotate__anti");
                self.navWrapper.css("display", "block");
                self.hamburgerVisible = false;
                return;
            }
            if (!self.hamburgerVisible) {
                hamLine2.removeAttr("hidden");
                hamLine1.removeClass("ham-rotate__clock");
                hamLine3.removeClass("ham-rotate__anti");
                // self.navWrapper.css("display", "none");
                self.navWrapper.slideUp(300);
                self.hamburgerVisible = true;
                return;
            }
        };
        return MainDoc;
    }());
    var ob = new MainDoc($(document), window.outerWidth);
    ob.init();
});
