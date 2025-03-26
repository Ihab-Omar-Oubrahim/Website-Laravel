const carousel = document.querySelector('.carousel'),
        firstImg = carousel.querySelectorAll(".slide")[0];
        arrowIcons = document.querySelectorAll('.wrapper i');

        let marginIMG = 0;

        function updateValueBasedOnWidth() {
            if (window.innerWidth <= 992) {
                marginIMG = 18
            } else {
                marginIMG = 18
            }
        }

    

        let isDragStart = false, isDragging = false, prevPageX, prevScrollLeft, positionDiff;

        const showHideIcons = () => {
            let scrollWidth = carousel.scrollWidth - carousel.clientWidth;
            arrowIcons[0].style.display = carousel.scrollLeft == 0 ? "none" : "block";
            arrowIcons[1].style.display = carousel.scrollLeft == scrollWidth ? "none" : "block";
        }

        arrowIcons.forEach(icon => {
            icon.addEventListener("click", () => {
                updateValueBasedOnWidth();
                let firstImgWidth = firstImg.clientWidth + marginIMG;
        
                if (icon.id === "left") {
                    let remainingScroll = carousel.scrollLeft % firstImgWidth;
                    carousel.scrollLeft -= remainingScroll ? remainingScroll : firstImgWidth;  
                } else if (icon.id === "right") {
                    let remainingScroll = carousel.scrollLeft % firstImgWidth;
                    carousel.scrollLeft += (firstImgWidth - remainingScroll);
                }
        
                setTimeout(() => showHideIcons(), 60); 
            });
        });


        const dragStart = (e) => {
            isDragStart = true;
            prevPageX = e.pageX || e.touches[0].pageX;
            prevScrollLeft = carousel.scrollLeft;
        }

        const dragging = (e) => {
            if (!isDragStart) return;
            e.preventDefault();
            isDragging = true;
            carousel.classList.add("dragging");
            positionDiff = (e.pageX || e.touches[0].pageX) - prevPageX;
            carousel.scrollLeft = prevScrollLeft - positionDiff;
            showHideIcons();
        }

        const autoSlide = () => {
            if(carousel.scrollLeft == (carousel.scrollWidth - carousel.clientWidth)) return;
            positionDiff = Math.abs(positionDiff);
            let firstImgWidth = firstImg.clientWidth + 14;
            let valDifference = firstImgWidth - positionDiff;

            if(carousel.scrollLeft > prevScrollLeft){
                return carousel.scrollLeft += positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff
            }
            carousel.scrollLeft -= positionDiff > firstImgWidth / 3 ? valDifference : -positionDiff
        }

        const dragStop = (e) => {
            isDragStart = false;
            carousel.classList.remove("dragging");
            isDragging = false;
           // autoSlide();
        }
        

        carousel.addEventListener("mousedown", dragStart);
        carousel.addEventListener("touchstart", dragStart);

        carousel.addEventListener("mousemove", dragging);
        carousel.addEventListener("touchmove", dragging);

        carousel.addEventListener("mouseup", dragStop);
        carousel.addEventListener("mouseleave", dragStop);

        carousel.addEventListener("touchend", dragStop);

        window.addEventListener('resize', updateValueBasedOnWidth);