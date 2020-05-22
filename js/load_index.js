let cost = 0;
            window.onload = onAllAssetsLoaded();
            function onAllAssetsLoaded() {
                ajaxDisplayUnits(cost);
            }
            function setCost(newCost)
            {
                cost = newCost;
                onAllAssetsLoaded();
            }

            function reset()
            {
                cost = 0;
                onAllAssetsLoaded();
                let btn = document.getElementsByClassName("options");
                for (let i = 0; i < btn.length; i++) {
                    btn[i].classList.remove("clicked");
                }
            }