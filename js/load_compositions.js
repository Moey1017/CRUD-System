let tier = 'all';
            let comp_id = 0;
            let deleteOn = false;
            console.log(deleteOn);
            window.onload = onAllAssetsLoaded();
            function onAllAssetsLoaded() {
                ajaxDisplayAllComps(tier, deleteOn); // loads all compositions 
                ajaxGetCompOptions(); // loads compositions available for options 
                ajaxGetUnitOptions(comp_id); // loads units options 
            }

            function setTier(newTier)
            {
                tier = newTier;
                ajaxDisplayAllComps(tier, deleteOn);
            }

            function reset()
            {
                tier = 'all';
                onAllAssetsLoaded();
                let btn = document.getElementsByClassName("options");
                for (let i = 0; i < btn.length; i++) {
                    btn[i].classList.remove("clicked");
                }
            }
            function deleteMode()
            {
                if (deleteOn === false)
                {
                    alert("Delete Mode Has been Turned on.")
                    deleteOn = true;
                } else
                {
                    deleteOn = false;
                }
                onAllAssetsLoaded();
            }