let btn = document.getElementsByClassName("options");
        let switchNav = e => {
            for (let i = 0; i < btn.length; i++) {
                btn[i].classList.remove("clicked");
            }
            e.target.classList.add("clicked");
        };
        for (let i = 0; i < btn.length; i++)
        {
            btn[i].addEventListener("click", switchNav);
        }