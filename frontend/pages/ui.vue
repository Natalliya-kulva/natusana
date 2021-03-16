<template>
    <main class="ui">
        <div class="grid-container test1">
            <h2>Margin Block Grid</h2>
            <p>small 2, medium 4, large 6</p>

            <div class="grid-x grid-margin-x small-up-2 medium-up-4 large-up-6">
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
            </div>

            <h2>Padding Block Grid</h2>
            <p>small 1, medium 3, large 5</p>

            <div
                class="grid-x grid-padding-x small-up-1 medium-up-3 large-up-5"
            >
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
                <div class="cell">
                    <div class="demo">cell</div>
                </div>
            </div>
        </div>

        <div class="grid-container test2">
            <h2>
                These hollow buttons should have arrow color that matches
                border.
            </h2>
            <button class="dropdown hollow button tiny">Dropdown Button</button>
            <button class="dropdown hollow secondary button small">
                Dropdown Button
            </button>
            <button class="dropdown hollow alert button">
                Dropdown Button
            </button>
            <button class="dropdown hollow success button large">
                Dropdown Button
            </button>
            <button class="dropdown hollow warning button expanded">
                Dropdown Button
            </button>
        </div>

        <div class="grid-container test3">
            <div class="grid-x grid-padding-x">
                <div class="cell">
                    <h2 class="margin-top-1">Font Wide</h2>
                    <p class="font-wide">
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="cell">
                    <h2 class="margin-top-1">Font Normal</h2>
                    <p class="font-normal">
                        Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit. Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                    </p>
                </div>
                <div class="cell">
                    <h2 class="margin-top-1">Font Bold</h2>
                    <p class="font-bold">
                        Perspiciatis tempore cumque, magni aspernatur, quidem.
                        Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate
                        velit esse
                    </p>
                </div>
                <div class="cell">
                    <h2 class="margin-top-1">Font Italic</h2>
                    <p class="font-italic">
                        Lorem minus, placeat, cillum dolore eu fugiat nulla
                        pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim
                        id est laborum.iure voluptas aliquam tempora neque?
                    </p>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
export default {};
</script>

<style>
.ui .test1 .demo {
    background: #1779ba;
    height: 100%;
}

.ui .test1 .cell {
    line-height: 50px;
    height: 50px;
    color: white;
    text-align: center;
    margin-bottom: 30px;
}

.ui h2 {
    margin-top: 2rem;
}

.ui h3 {
    margin-top: 1rem;
    border-top: 1px solid #ddd;
    padding-top: 1rem;
}

.ui .test1 .grid-demo .cell {
    background: #ddd;
    color: #444;
    margin-bottom: 0;
    text-align: left;
    line-height: 1.6;
    height: auto;
}
</style>
