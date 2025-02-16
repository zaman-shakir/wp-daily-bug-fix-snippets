document.addEventListener("DOMContentLoaded", function () {
    const stockElements = {
        backorderStock: document.getElementById("backorder-stock"),
        outStock: document.getElementById("out-stock"),
        fewStock: document.getElementById("few-stock"),
        inStock: document.getElementById("in-stock"),
    };

    const variationForm = document.querySelector(".variations_form");
    if (!variationForm) return;

    function hideAllStatuses() {
        Object.values(stockElements).forEach((element) => {
            if (element) {
                element.classList.remove("stock-status-active");
                element.classList.add("stock-status-hidden");
            }
        });
    }

    function showStatus(statusId) {
        const element = stockElements[statusId];
        if (element) {
            element.classList.remove("stock-status-hidden");
            element.classList.add("stock-status-active");
        }
    }

    function updateStatusFromVariation(variation) {
        hideAllStatuses();

        if (variation.availability_html.includes("available-on-backorder")) {
            showStatus("backorderStock");
        } else if (!variation.is_in_stock || variation.stock_quantity === 0) {
            showStatus("outStock");
        } else if (variation.stock_quantity && variation.stock_quantity < 5) {
            showStatus("fewStock");
        } else {
            showStatus("inStock");
        }
    }

    // Handle variation selection using event delegation
    document.addEventListener("click", function (event) {
        const button = event.target.closest(".variation-button");
        if (!button) return;

        if (button.classList.contains("disabled")) return;

        const select = document.querySelector("#pa_vaelgvariant");
        if (!select) return;

        select.value = button.dataset.value;

        try {
            const variationData = JSON.parse(
                variationForm.getAttribute("data-product_variations")
            );

            const variation = variationData.find(
                (item) =>
                    item.attributes["attribute_pa_vaelgvariant"] ===
                    button.dataset.value
            );

            if (variation) {
                updateStatusFromVariation(variation);
            } else {
                showStatus("outStock");
            }

            const event = new Event("change", { bubbles: true });
            select.dispatchEvent(event);
        } catch (error) {}
    });

    // Handle reset (Clear button)
    const resetButton = document.querySelector(".reset_variations");
    if (resetButton) {
        resetButton.addEventListener("click", function (e) {
            e.preventDefault();
            hideAllStatuses();

            // Get default values from localized script
            const { defaultStatus, defaultQuantity } = stockStatusData;

            if (defaultStatus === "outofstock") {
                showStatus("outStock");
            } else if (defaultStatus === "onbackorder") {
                showStatus("backorderStock");
            } else if (defaultQuantity < 5) {
                showStatus("fewStock");
            } else {
                showStatus("inStock");
            }
        });
    }
});
