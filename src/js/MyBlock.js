// import Wrapper from "./modules/Wrapper.js";
(function (wp) {
  const { registerBlockType } = wp.blocks;
  const { RichText } = wp.editor;
  const eyeIcon = (
    <svg
      fill="#000000"
      viewBox="-3.2 -3.2 38.40 38.40"
      version="1.1"
      xmlns="http://www.w3.org/2000/svg"
      stroke="#000000"
      stroke-width="0.48"
    >
      <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
      <g
        id="SVGRepo_tracerCarrier"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke="#CCCCCC"
        stroke-width="0.064"
      ></g>
      <g id="SVGRepo_iconCarrier">
        <path d="M1.53 10.104l0-0-0-0zM1.53 10.104c1.687 3.084 3.637 4.794 3.644 8.252 0.002 1.374-1.003 1.841-1.003 2.879 0 0.567 0.725 1.13 1.312 1.13 0.574 0 1.348-0.605 1.348-1.202 0-1.032-0.964-1.41-0.964-2.624 0-4.068 7.063-1.541 7.398 4.118 0.171 2.894-1.421 3.089-1.421 4.482 0 1.116 0.734 1.531 1.494 1.531 0.743 0 1.348-0.355 1.348-1.531 0-0.961-1.276-1.583-1.239-4.446 0.078-5.998 5.074-3.994 5.357 2.296 0.084 1.866-1.203 2.521-1.203 3.972 0 0.807 0.626 1.385 1.312 1.385 0.67 0 1.385-0.608 1.385-1.458 0-1.53-1.278-2.071-1.239-3.972 0.14-6.893 4.328-11.686 5.102-4.847 0.185 1.636-0.984 2.22-0.984 3.681 0 0.87 0.596 1.494 1.166 1.494 0.583 0 1.13-0.595 1.13-1.421 0-1.413-1.187-2.103-0.984-3.79 0.761-6.337 4.365-7.4 6.086-9.928-7.623-11.055-23.096-11.073-29.044-0zM3.168 10.101v0c5.177-9.274 19.619-9.291 25.768 0.309-9.348 6.764-17.486 6.775-25.768-0.309zM20.825 9.259c0 2.806-2.275 5.081-5.081 5.081s-5.081-2.275-5.081-5.081 2.275-5.081 5.081-5.081 5.081 2.275 5.081 5.081zM17.532 9.062c0 1.006-0.816 1.822-1.822 1.822s-1.822-0.816-1.822-1.822 0.816-1.822 1.822-1.822c1.006 0 1.822 0.816 1.822 1.822zM5.506 20.372v-5.72zM13.276 25.68v-5.72zM18.915 27.174v-5.72zM24.356 22.691v-5.72z"></path>{" "}
      </g>
    </svg>
  );

  registerBlockType("outlander/my-block", {
    title: "My Block",
    icon: eyeIcon,
    category: "common",
    keywords: ["myblock", "MyBlock"],
    attributes: {
      blockDescription: {
        type: "array",
        source: "children",
        selector: ".blockDescriptionClass",
      },
      titleDescription: {
        type: "array",
        source: "children",
        selector: "h2",
      },
    },
    edit: (props) => {
      const {
        attributes: { blockDescription, titleDescription },
        clasName,
        isSelected,
        setAttributes,
      } = props;

      return (
        <div>
          <RichText
            tagName="h2"
            onChange={(value) => setAttributes({ titleDescription: value })}
            value={titleDescription}
            formattingControls={[]}
          />
          <RichText
            tagName="div"
            multiline="p"
            onChange={(value) => setAttributes({ blockDescription: value })}
            value={blockDescription}
          />
        </div>
      );
    },
    save: (props) => {
      return (
        <div>
          <h2>{props.attributes.titleDescription}</h2>
          <div className="blockDescriptionClass">
            {props.attributes.blockDescription}
          </div>
        </div>
      );
    },
  });
})(window.wp);
